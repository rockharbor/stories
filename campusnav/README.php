CREATED BY BRANDON SETTER on 7/7/15

NOTES:
MUST HAVE Advanced Custom Fields Plugin Installed.
Be sure to load in the default ACF Fields and Default Content (import file: ACFglobal-campus-nav.json in to ACF)

INCLUDE THIS IN THE SITE HEAD:
<!-- CAMPUS NAV -->
<link rel="stylesheet" type="text/css" href="<?php bloginfo('template_directory'); ?>/campusnav/campusnav.css">




PLACE THIS WHERE YOU WANT THE MENU TO APPEAR:
<?php include (TEMPLATEPATH . '/campusnav/global_campus_nav.php' ); //CAMPUS NAV PLACEMENT ?>




PLACE THIS WHERE YOU WANT THE SLIDE OUT MENUS TO APPEAR:
<?php include (TEMPLATEPATH . '/campusnav/campusnav_slideouts.php' ); //CAMPU SLIDE OUT PLACEMENT ?>





INCLUDE THIS BEFORE ENDING /BODY TAG:
<!-- CAMPUS NAV MENU -->
<script type="text/javascript" src="<?php bloginfo('template_directory'); ?>/campusnav/jquery.sidr.min.js"></script>
<script type="text/javascript" src="<?php bloginfo('template_directory'); ?>/campusnav/campusnav.js"></script> 