<?php

/*

Template Name: Image Right
Description: The is the post template with the GIANT Image on the RIGHT.

*/

get_header(); // This fxn gets the header.php file and renders it ?>



			<?php if ( have_posts() ) :
			// Do we have any posts in the databse that match our query?
			?>

				<?php while ( have_posts() ) : the_post();
				// If we have a post to show, start a loop that will display it
				?>







  <div class="w-hidden-medium w-hidden-small w-hidden-tiny post-leftcol post-right" style="<?php include (TEMPLATEPATH . '/includes/background.php' ); ?>background-position: 0% 0%, 65% 50%;">
  		<?php include (TEMPLATEPATH . '/includes/titleblock.php' ); ?>
  </div>
  <div class="w-clearfix post-rightcol post-left" data-ix="scroll-hides-nav">
    <?php include (TEMPLATEPATH . '/includes/titleblock-mobilepost.php' ); ?>


    <article class="article">
    	<?php the_content(); ?>
    </article>






				<?php endwhile; // OK, let's stop the post loop once we've displayed it ?>

				<?php
					// If comments are open or we have at least one comment, load up the default comment template provided by Wordpress
					if ( comments_open() || '0' != get_comments_number() )
						comments_template( '', true );
				?>


			<?php else : // Well, if there are no posts to display and loop through, let's apologize to the reader (also your 404 error) ?>


			<?php endif; // OK, I think that takes care of both scenarios (having a post or not having a post to show) ?>



	<?php include (TEMPLATEPATH . '/includes/nextpost.php' ); ?>
    </div>


<?php get_footer(); // This fxn gets the footer.php file and renders it ?>
