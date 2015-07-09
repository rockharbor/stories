	<?php $image_id = get_post_thumbnail_id(); $image_url = wp_get_attachment_image_src($image_id,'single-post-thumbnail', true);  ?>
	  background-image: -webkit-radial-gradient(50% 50%, circle, rgba(0, 0, 0, 0), rgba(0, 0, 0, 0.34)), url('<?php echo $image_url[0]; ?>');
	  background-image: radial-gradient(circle at 50% 50%, rgba(0, 0, 0, 0), rgba(0, 0, 0, 0.34)), url('<?php echo $image_url[0]; ?>');
	  background-position: 0% 0%, 50% 50%;
	  background-size: auto, cover;
	  background-repeat: repeat, no-repeat;
	<?php if ( has_post_format( 'video' )) { ?>
	<?php } elseif ( has_post_format( 'audio' )) { ?>
	<?php } elseif ( has_post_format( 'quote' )) { ?>
	
		background-color: <?php the_sub_field('background_color'); ?>;
			
	<?php } else { ?>
	
	<?php } ?>  
	
	  color: white;
	  