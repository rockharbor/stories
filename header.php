
<!DOCTYPE html>
<!-- This site was created in Webflow. http://www.webflow.com-->
<!-- Last Published: Tue Jun 02 2015 21:03:32 GMT+0000 (UTC) -->
<html data-wf-site="55550013bb87e1146ef89e94" data-wf-page="55550013bb87e1146ef89e95" xmlns="http://www.w3.org/1999/xhtml" xmlns:fb="http://ogp.me/ns/fb#">
<head>
  <meta charset="utf-8">
  <title>
  	<?php bloginfo('name'); // show the blog name, from settings ?> |
	<?php is_front_page() ? bloginfo('description') : wp_title(''); // if we're on the home page, show the description, from the site's settings - otherwise, show the title of the post or page ?>
  </title>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="generator" content="Webflow">
  <?php if (get_field('google_analytics', 'option')): ?>

  <!-- Google Analytics -->
  <?php the_field('google_analytics', 'option'); ?>
  <?php endif; ?>

  <!-- Facebook Image Meta -->
  <?php $image_id = get_post_thumbnail_id(); $image_url = wp_get_attachment_image_src($image_id,'single-post-thumbnail', false);  ?>
  <meta property="og:image" content="<?php echo $image_url[0]; ?>" />
  
  <link rel="stylesheet" type="text/css" href="<?php bloginfo('template_directory'); ?>/css/normalize.css"> <!-- RESET -->
  <link rel="stylesheet" type="text/css" href="<?php bloginfo('template_directory'); ?>/css/webflow.css"> <!-- WEBFLOW RESET -->
  <link rel="stylesheet" type="text/css" href="<?php bloginfo('template_directory'); ?>/css/rockharbor-stories.webflow.css"> <!-- THEME -->
  <!-- CAMPUS NAV -->
  <link rel="stylesheet" type="text/css" href="<?php bloginfo('template_directory'); ?>/campusnav/campusnav.css">
  <link rel="stylesheet" type="text/css" href="<?php bloginfo('template_directory'); ?>/style.css"> <!-- OVERRIDES -->

  <!-- FONTS -->
  <!-- <link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css"> -->
  <script src="https://ajax.googleapis.com/ajax/libs/webfont/1.4.7/webfont.js"></script>
  <script>
    WebFont.load({
      google: {
        families: ["Montserrat:400,700"]
      }
    });
  </script>

  <!-- JQUERY -->
  <script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>

  <!-- WEBFLOW FUNCTIONALITY -->
  <script type="text/javascript" src="<?php bloginfo('template_directory'); ?>/js/webflow.js"></script>
  <!--[if lte IE 9]><script src="https://cdnjs.cloudflare.com/ajax/libs/placeholders/3.0.2/placeholders.min.js"></script><![endif]-->

  <!--  FIT VID to make videos fit the width of their containers  -->
  <script src="<?php bloginfo('template_directory'); ?>/js/jquery.fitvids.js"></script>
  <script>
    $(document).ready(function(){
    // Target your .container, .wrapper, .post, etc.
    $("article").fitVids();
    });
  </script>


    <!-- CAMPUS NAV MENU -->
  <script type="text/javascript" src="<?php bloginfo('template_directory'); ?>/campusnav/jquery.sidr.min.js"></script> 
  <script type="text/javascript" src="<?php bloginfo('template_directory'); ?>/campusnav/campusnav.js"></script>
  <script type="text/javascript" src="<?php bloginfo('template_directory'); ?>/js/modernizr.js"></script> <!-- RESET -->
  <script type="text/javascript" src="<?php bloginfo('template_directory'); ?>/js/ajax-frontpage.js"></script> <!-- Load more posts using ajax -->

  <!-- FAVICONS -->
  <link rel="apple-touch-icon-precomposed" sizes="180x180" href="<?php bloginfo( 'template_directory' ); ?>/images/appicon-180.png">
  <link rel="apple-touch-icon-precomposed" sizes="152x152" href="<?php bloginfo( 'template_directory' ); ?>/images/appicon-152.png">
  <link rel="apple-touch-icon-precomposed" sizes="144x144" href="<?php bloginfo( 'template_directory' ); ?>/images/appicon-144.png">
  <link rel="icon" type="image/x-icon" href="<?php bloginfo( 'template_directory' ); ?>/images/favicon.ico">

</head>
<body>

<div class="w-section navigation">
<?php include (TEMPLATEPATH . '/campusnav/global_campus_nav.php' ); //CAMPUS NAV PLACEMENT ?>
    <div class="w-nav navbar" data-collapse="medium" data-animation="default" data-duration="400">
      <div class="w-container">
        <a class="w-inline-block logo" href="/"><img src="<?php the_field('top_logo', 'option'); ?>" width="300">
        </a>
		<nav class="w-nav-menu menubg" role="navigation">
			<?php if(have_rows('top_level_menu_item', 'option')): ?>
					<?php while(has_sub_field('top_level_menu_item', 'option')): ?>
			          	<?php if ( get_sub_field('add_sub_menu') == false ) { ?>
					  		<a class="w-nav-link navlink" href="<?php the_sub_field('link', 'option'); ?>"><?php the_sub_field('title', 'option'); ?></a>
					  	<?php } else { ?>
					  		<div class="w-dropdown" data-delay="200">
					  			<div class="w-dropdown-toggle navlink">
						  			<div><?php the_sub_field('title', 'option'); ?></div>
						  		</div>
								<?php if(get_sub_field('sub_menu', 'option')): ?>
							        <nav class="w-dropdown-list dropdownlist">
										<?php while(has_sub_field('sub_menu', 'option')): ?>
											<?php if(get_sub_field('link', 'option')){ ?>
												<a class="w-dropdown-link dropdownlink" href="<?php the_sub_field('link', 'option'); ?>"><?php the_sub_field('title', 'option'); ?></a>
											<?php } else { ?>
										  		<?php
												$term = get_sub_field('category', 'option');
												if( $term ): ?>
														<a class="w-dropdown-link dropdownlink" href="<?php echo get_term_link( $term ); ?>"><?php echo $term->name; ?></a>
												<?php endif; ?>
										  	<?php } ?>
										<?php endwhile; ?>

							        </nav>
								<?php endif; ?>
							</div>
						<?php } ?>
					<?php endwhile; ?>
			<?php endif; ?>
		</nav>
        <div class="w-nav-button">
          <div class="w-icon-nav-menu"></div>
        </div>

      </div>
    </div>
</div>
<?php include (TEMPLATEPATH . '/campusnav/campusnav_slideouts.php' ); //CAMPUS SLIDE OUT PLACEMENT ?>
