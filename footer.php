<?php if ( is_single() ) { ?>

<!-- Hide the footer when we are one a post. Going for the Magazine Effect. -->

<?php	} else { ?>

	<div class="w-section footer">
	    <div class="w-row">
	      <div class="w-col w-col-4 w-col-stack">
		      	<a class="button" href="<?php the_field('left_button_link', 'option'); ?>"><?php the_field('left_button_title', 'option'); ?></a>
	      </div>
	      <div class="w-col w-col-4 w-col-stack">
		      	<a class="button" href="<?php the_field('right_button_link', 'option'); ?>"><?php the_field('right_button_title', 'option'); ?></a>
	      </div>
	      <div class="w-col w-col-4 w-col-stack">
		  		<?php include (TEMPLATEPATH . '/searchform.php' ); //This includes the Search Form ?>
	      </div>
	    </div>
	    <div class="w-container"><img class="footerlogo" src="<?php bloginfo('template_directory'); ?>/images/footer-logo.png">
	      	<p class="copyright">&copy; <?php echo date('Y'); ?> ROCKHARBOR</p>
	    </div>
	</div>

<?php } 

wp_footer();

// This fxn allows plugins to insert themselves/scripts/css/files (right here) into the footer of your website.
// Removing this fxn call will disable all kinds of plugins.
// Move it if you like, but keep it around.
?>

</body>
</html>
