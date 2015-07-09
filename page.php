<?php
/**
 * The template for displaying any single page.
 *
 */

get_header(); // This fxn gets the header.php file and renders it ?>
  


<?php if ( has_post_thumbnail() ) { ?>
	<div class="w-section pageheader" style="<?php include (TEMPLATEPATH . '/includes/background.php' ); ?>" data-ix="scroll-hides-nav"></div>
<?php } ?>

	<div class="defaultcontent">

			<?php if ( have_posts() ) : 
			// Do we have any posts/pages in the databse that match our query?
			?>



				<?php while ( have_posts() ) : the_post(); 
				// If we have a page to show, start a loop that will display it
				?>


	
						
						<h2 class="title"><?php the_title(); // Display the title of the page ?></h2>
						
							<?php the_content(); 
							// This call the main content of the page, the stuff in the main text box while composing.
							// This will wrap everything in p tags
							?>
							
				
			
				<?php endwhile; // OK, let's stop the page loop once we've displayed it ?>

			<?php else : // Well, if there are no posts to display and loop through, let's apologize to the reader (also your 404 error) ?>
				
				
				

			<?php endif; // OK, I think that takes care of both scenarios (having a page or not having a page to show) ?>

	
	
	
	</div>
	
	
	
	
<?php get_footer(); // This fxn gets the footer.php file and renders it ?>