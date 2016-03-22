<?php
/**
 * The template for displaying the home/index page.
 * This template will also be called in any case where the Wordpress engine
 * doesn't know which template to use (e.g. 404 error)
 */

get_header(); // This fxn gets the header.php file and renders it ?>

<div class="w-section w-clearfix archivepage">
	<div class="w-row">

			<?php if ( have_posts('cat=-31') ) :
			// Do we have any posts in the databse that match our query?
			// In the case of the home page, this will call for the most recent posts
			?>

				<?php while ( have_posts() ) : the_post();
				// If we have some posts to show, start a loop that will display each one the same way
				?>
				    <div class="w-col w-col-4 home-portrait" style="<?php include (TEMPLATEPATH . '/includes/background.php' ); ?>" data-ix="mouse-over-titles">
					   <?php include (TEMPLATEPATH . '/includes/titleblock.php' ); ?>
				    </div>

				<?php endwhile; // OK, let's stop the posts loop once we've exhausted our query/number of posts ?>




			<?php else : // Well, if there are no posts to display and loop through, let's apologize to the reader (also your 404 error) ?>

				<article class="post error">
					<h2 class="404">No posts have been found matching your search or category.</h2>
				</article>

			<?php endif; // OK, I think that takes care of both scenarios (having posts or not having any posts) ?>


	</div>
</div>
<?php include (TEMPLATEPATH . '/includes/pagination.php' ); ?>



<?php get_footer(); // This fxn gets the footer.php file and renders it ?>
