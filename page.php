<?php
/**
 * The template for displaying any single page.
 *
 */

get_header(); ?>
  


<?php if ( has_post_thumbnail() ) { ?>
	<div class="w-section pageheader" style="<?php include (TEMPLATEPATH . '/includes/background.php' ); ?>" data-ix="scroll-hides-nav"></div>
<?php } else { ?>
	<div class="clearmenu"></div>
<?php } ?>
<div class="w-container">		  
	<div class="defaultcontent">

			<?php if ( have_posts() ) : ?>

				<?php while ( have_posts() ) : the_post();?>

						<h2 class="title"><?php the_title(); ?></h2>
						
						<?php the_content(); ?>

				<?php endwhile; ?>

			<?php else : ?>

			<?php endif; ?>

	</div>
</div>	
	
	
	
<?php get_footer(); ?>