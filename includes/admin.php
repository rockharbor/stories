<?php
/**
 * Includes
 */

require_once INCLUDES . DS . 'S3.php';

/**
 * ROCKHARBOR Admin class. All admin (backend) tasks should go here.
 */

$pathsToInvalidate = array();

function addActions() {
    add_action( 'admin_init', 'init' );  // initialize admin settings
}

function init() {
    add_settings_section( 'rh-options', 'RH Theme Options', 'section_callback', 'general' ); // add RH Theme Options section on General settings page
    // add individual settings to RH section
    add_settings_field( 's3_download', 'Amazon Cloudfront Download Distribution', 'render_option_field', 'general', 'rh-options', array(
        'id' => 's3_download',
        'label_for' => 's3_download',
        'after' => '<small><strong>&lt;ID&gt;.cloudfront.net</strong></small>'
    ) );
    add_settings_field( 's3_bucket', 'Amazon S3 Bucket', 'render_option_field', 'general', 'rh-options', array(
        'id' => 's3_bucket',
        'label_for' => 's3_bucket',
        'after' => '<small><strong>&lt;bucket&gt;.s3.amazonaws.com</small></strong>'
    ) );
    add_settings_field( 's3_access_key', 'Amazon S3 Access Key', 'render_option_field', 'general', 'rh-options', array(
        'id' => 's3_access_key',
        'label_for' => 's3_access_key'
    ) );
    add_settings_field( 's3_access_secret', 'Amazon S3 Secret Access Key', 'render_option_field', 'general', 'rh-options', array(
        'id' => 's3_access_secret',
        'label_for' > 's3_access_secret'
    ) );

    register_setting( 'general', 's3_download' ); // create wp option group for rockharbor settings
    register_setting( 'general', 's3_bucket' );
    register_setting( 'general', 's3_access_key' );
    register_setting( 'general', 's3_access_secret' );

    add_filter( 'wp_delete_file', 'deleteS3File' ); // removes file from S3 and gives WP the path to the local copy if there is one
    add_filter( 'wp_redirect', 'invalidateCloudfrontPosts' ); // invalidates cloudfront paths on redirect from batch delete
    add_filter( 'wp_update_attachment_metadata', 'transferToS3', 10, 2 ); // moves attachment to S3 and updates URL
}

function section_callback() {
    echo '<p>Fill out these settings to connect the theme to Amazon S3 and Cloudfront for image storage and edge caching</p>';
}

function render_option_field($args) {
    $optionValue = get_option( $args['id'] );
    $id = $args['id'];
    $after = isset( $args['after'] ) ? $args['after'] : null;
    echo "<input name='$id' id='$id' type='textarea' value='$optionValue'> $after";
}

/**
 * Delete file from S3 when deleted from local disk
 *
 * Wordpress sometimes sends a partial path and sometimes sends an unescaped path
 * (depending on the OS), so this function normalizes it and removes the object
 * from the S3 bucket and returns a true absolute path to the file for `unlink()`
 * to do it's job.
 *
 * @param string $file Some sort of path
 * @return string Absolute path to file
 */
	function deleteS3File($file) {
		$s3Key = get_option('s3_access_key');
		$s3KeySecret = get_option('s3_access_secret');
		$bucket = get_option('s3_bucket');

		$S3 = new S3($s3Key, $s3KeySecret);

		$path = getS3Path($file);

		// delete from bucket
		$S3->deleteObject($bucket, $path);

		// save this image path for later cloudfront invalidation
		$pathsToInvalidate[] = "/$path";

		return $file;
	}

/**
 * Invalidates all cloudfront paths stored in `$pathsToInvalidate`. Needs to
 * invalidate everything in a single batch request otherwise cloudfront limits
 * are hit (3 active invalidation requests per distribution)
 *
 * Called on each wp_redirect since that's the only way to capture multiple
 * delete calls in a single request (i.e., through the bulk actions)
 *
 * @param integer $postId The original post ID
 */
	function invalidateCloudfrontPosts($url) {
		if (empty($pathsToInvalidate)) {
			return $url;
		}

		$s3Key = get_option('s3_access_key');
		$s3KeySecret = get_option('s3_access_secret');

		$S3 = new S3($s3Key, $s3KeySecret);

		// invalidate cloudfront cache (if applicable)
		$downloadDomain = get_option('s3_download');
		if (!empty($downloadDomain)) {
			$distributions = $S3->listDistributions();
			// get matching distribution id
			foreach ($distributions as $distributionId => $distributionDetails) {
				if ($distributionDetails['domain'] === $downloadDomain) {
					$S3->invalidateDistribution($distributionId, $this->pathsToInvalidate);
					break;
				}
			}
		}

		return $url;
	}

/**
 * Transfers a recently uploaded file to S3, and deletes the local copy
 *
 * @param array $data Attachment data
 * @param integer $postID Post id
 * @return array
 */
	function transferToS3($data, $postID) {
		// because sometimes it's not populated... #YAWPH
		$data['file'] = str_replace(DS, '/', get_attached_file($postID, true));

		if (!isset($data['sizes'])) {
			$data['sizes'] = array();
		}

		$s3Key = get_option('s3_access_key');
		$s3KeySecret = get_option('s3_access_secret');
		$bucket = get_option('s3_bucket');

		$S3 = new S3($s3Key, $s3KeySecret);

		$type = get_post_mime_type($postID);

		$file = array(
			'type' => $type,
			'file' => $data['file'],
			'size' => filesize($data['file']),
		);
		$s3filePath = getS3Path($data['file']);

		if (file_exists($data['file'])) {
			if ($S3->putObject($file, $bucket, $s3filePath, $S3::ACL_PUBLIC_READ)) {
				unlink($data['file']);
			}
		}

		foreach ($data['sizes'] as $thumbkey => $info) {
			$fullThumbPath = str_replace(basename($data['file']), $info['file'], $data['file']);
			$fullThumbPath = str_replace('/', DS, $fullThumbPath);

			$s3ThumbPath = str_replace(basename($s3filePath), $info['file'], $s3filePath);

			$file = array(
				'type' => $type,
				'file' => $fullThumbPath,
				'size' => filesize($fullThumbPath),
			);

			if (file_exists($fullThumbPath)) {
				if ($S3->putObject($file, $bucket, $s3ThumbPath, $S3::ACL_PUBLIC_READ)) {
					unlink($fullThumbPath);
				}
			}
		}
		return $data;
	}

/**
 * Takes a fully qualified local path and creates a partial path for S3.
 *
 * This is necessary because, historically S3 objects were maintained by a plugin
 * which modified the upload path
 *
 * @param type $fullPath Full local path to file
 * @return string Partial path
 */
	function getS3Path($fullPath = '') {
        $blogInfo = get_blog_details( get_current_blog_id() );

        $uploadpaths = wp_upload_dir();

		$possiblyFull = str_replace(DS, '/', $fullPath);
		$base = str_replace(DS, '/', $uploadpaths['basedir']);
		// now remove full path if it existed
		$partial = trim(str_replace($base, '', $possiblyFull), '/');

		// the s3 plugin that is currently used stores files under the domain
		$subsitePath = substr($blogInfo->domain, 0, strpos($blogInfo->domain, '.')) . '/files/';

		return ltrim($subsitePath . $partial, '/');
	}

addActions();
