<?php
define( 'INCLUDES', get_template_directory() . DS . 'includes' );

//RSS Feed Support
add_theme_support( 'automatic-feed-links' );


// add custom class to tag link
function add_class_the_tags($html){
    $postid = get_the_ID();
    $html = str_replace('<a','<a class="tags"',$html);
    return $html;
}
add_filter('the_tags','add_class_the_tags');


//Post thumbnails support
add_theme_support( 'post-thumbnails' );
add_image_size( 'single-post-thumbnail', 2000, 1125 ); 	// Increased the default size of the thumbnail slightly for larger browsers.
the_post_thumbnail( 'full', 0, 0  );            		// DISABLED Full resolution (original size uploaded)
the_post_thumbnail( 'thumbnail', 960, 540 );       		// Thumbnail
the_post_thumbnail( 'medium', 0, 0  );          		// DISABLED Medium resolution (default 300px x 300px max)
the_post_thumbnail( 'large', 0, 0 );           			// DISABLED Large resolution (default 640px x 640px max)



// Next and previous post links class
add_filter('next_posts_link_attributes', 'posts_link_attributes_1');
add_filter('previous_posts_link_attributes', 'posts_link_attributes_2');

function posts_link_attributes_1() {
    return 'class="button newer-button"';
}
function posts_link_attributes_2() {
    return 'class="button older-button"';
}

// S3 Urls
add_filter( 'wp_get_attachment_url', 's3Url' );

function s3Url($url) {
	$blogInfo = get_blog_details( get_current_blog_id() );

	$subsitePath = 'wp-content/uploads';
	list($sub, $domain, $tld) = explode('.', $blogInfo->domain);
	// the s3 plugin that is currently used stores files under the domain
	$subsitePath = $sub.'/files';

	$uploadpaths = wp_upload_dir();
	$path = $subsitePath . str_replace($uploadpaths['baseurl'], '', $url);

	$downloadDistribution = get_option( 's3_download' );
	$bucket = get_option( 's3_bucket' );

	$url = 'http://'.$bucket.'.s3.amazonaws.com/'.$path;
	if (!empty($downloadDistribution) && !is_admin()) {
		$url = "http://$downloadDistribution/$path";
	}

	return $url;
}

//Add Post Formats (limit to these types)
add_theme_support( 'post-formats', array( 'video', 'quote', 'audio' ) );


//Options Pages Added
if( function_exists('acf_add_options_page') ) {

	acf_add_options_page(array(
		'page_title' 	=> 'Main Menu',
		'menu_title'	=> 'Main Menu',
		'menu_slug' 	=> 'main_menu',
		'redirect'		=> false
	));
	acf_add_options_page(array(
		'page_title' 	=> 'Footer',
		'menu_title'	=> 'Footer',
		'menu_slug' 	=> 'footer',
		'redirect'		=> false
	));
	acf_add_options_page(array(
		'page_title' 	=> 'Other Options',
		'menu_title'	=> 'Other Options',
		'menu_slug' 	=> 'other_options',
		'redirect'		=> false
	));

}

// Add admin menu options
if ( is_admin() ) {
    require_once INCLUDES . DS . 'admin.php';
}


//ALLOW .SVG File Type For Logos and Graphics
function cc_mime_types($mimes) {
  $mimes['svg'] = 'image/svg+xml';
  return $mimes;
}
add_filter('upload_mimes', 'cc_mime_types');


// Add CSS Styles to Visual Editor so user can see output while editing.
    add_editor_style('/css/rockharbor-stories.webflow.css');
    add_editor_style('/style.css');



