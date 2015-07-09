<?php
/**
 * 	Template Name: Home Page

*/
get_header();  ?>






<!-- display the STICKY post -->
<?php
$args = array(
   'post__in' => get_option('sticky_posts'),
	'caller_get_posts' => 1
);
$my_query = new WP_Query($args) ; ?>
<?php while ($my_query->have_posts()) : $my_query->the_post(); ?>

  <div class="w-section header" style="<?php include (TEMPLATEPATH . '/includes/background.php' ); ?>">
    <div class="w-container hero">
	    <img class="icon" src="<?php bloginfo('template_directory'); ?>/images/video-outline.svg" width="24">
		<span class="category"><?php the_category(' '); ?></span>
		<a class="w-inline-block header-link" href="<?php the_permalink(); ?>"><h1><?php the_title(); ?></h1></a>
      <div class="w-clearfix">
        <div class="date">
          <div class="month"><?php the_time('M'); ?></div>
          <div class="day"><?php the_time('d'); ?></div>
          <div class="year"><?php the_time('Y'); ?></div>
        </div>
        <p class="hero-p"><?php the_excerpt(); ?></p>
        <?php the_tags( '', ' ', ' ' ); ?>
      </div>
    </div>
  </div>

<?php endwhile; // OK, let's stop the posts loop once we've exhausted our query/number of posts ?>

<div class="w-row">
<!-- 	display posts 1 thru 3 -->
	<?php query_posts('showposts=3'); ?>
	<?php $posts = get_posts('numberposts=3&offset=0'); foreach ($posts as $post) : start_wp(); ?>
	<?php static $count2 = 0; if ($count2 == "3") { break; } else { ?>

	    <div class="w-col w-col-4 w-col-stack home-portrait" style="<?php include (TEMPLATEPATH . '/includes/background.php' ); ?>" data-ix="mouse-over-titles">
	        <?php include (TEMPLATEPATH . '/includes/titleblock.php' ); ?>
	    </div>

	<?php $count2++; } ?>
	<?php endforeach; ?>
</div>

<div class="w-row">
<!--  display post 4 -->
	<?php query_posts('showposts=1'); ?>
	<?php $posts = get_posts('numberposts=1&offset=3'); foreach ($posts as $post) : start_wp(); ?>
	<?php static $count3 = 0; if ($count3 == "1") { break; } else { ?>

	    <div class="w-col w-col-4 home-portrait" style="<?php include (TEMPLATEPATH . '/includes/background.php' ); ?>" data-ix="mouse-over-titles">
		   <?php include (TEMPLATEPATH . '/includes/titleblock.php' ); ?>
	    </div>

	<?php $count3++; } ?>
	<?php endforeach; ?>


<!-- 	 display post 5 -->
	<?php query_posts('showposts=1'); ?>
	<?php $posts = get_posts('numberposts=1&offset=4'); foreach ($posts as $post) : start_wp(); ?>
	<?php static $count31 = 0; if ($count31 == "1") { break; } else { ?>

	    <div class="w-col w-col-8 home-portrait" style="<?php include (TEMPLATEPATH . '/includes/background.php' ); ?>" data-ix="mouse-over-titles">
	      <?php include (TEMPLATEPATH . '/includes/titleblock.php' ); ?>
	    </div>

	<?php $count31++; } ?>
	<?php endforeach; ?>
</div>


<div class="w-row">
<!-- 	display posts 6-8 -->
	<?php query_posts('showposts=3'); ?>
	<?php $posts = get_posts('numberposts=3&offset=5'); foreach ($posts as $post) : start_wp(); ?>
	<?php static $count4 = 0; if ($count4 == "3") { break; } else { ?>

	    <div class="w-col w-col-4 w-col-stack home-portrait" style="<?php include (TEMPLATEPATH . '/includes/background.php' ); ?>" data-ix="mouse-over-titles">
	      <?php include (TEMPLATEPATH . '/includes/titleblock.php' ); ?>
	    </div>

	<?php $count4++; } ?>
	<?php endforeach; ?>

</div>

<div class="w-row">
<!-- 	display post 9 -->
	<?php query_posts('showposts=1'); ?>
	<?php $posts = get_posts('numberposts=1&offset=8'); foreach ($posts as $post) : start_wp(); ?>
	<?php static $count5 = 0; if ($count5 == "1") { break; } else { ?>

	    <div class="w-col w-col-8 home-portrait" style="<?php include (TEMPLATEPATH . '/includes/background.php' ); ?>" data-ix="mouse-over-titles">
	      <?php include (TEMPLATEPATH . '/includes/titleblock.php' ); ?>
	    </div>

	<?php $count5++; } ?>
	<?php endforeach; ?>


<!-- 	display post 10 -->
	<?php query_posts('showposts=1'); ?>
	<?php $posts = get_posts('numberposts=1&offset=9'); foreach ($posts as $post) : start_wp(); ?>
	<?php static $count51 = 0; if ($count51 == "1") { break; } else { ?>

	    <div class="w-col w-col-4 home-portrait" style="<?php include (TEMPLATEPATH . '/includes/background.php' ); ?>" data-ix="mouse-over-titles">
	      <?php include (TEMPLATEPATH . '/includes/titleblock.php' ); ?>
	    </div>

	<?php $count51++; } ?>
	<?php endforeach; ?>
</div>


<div class="w-row">
<!-- 	display post 11 -->
	<?php query_posts('showposts=1'); ?>
	<?php $posts = get_posts('numberposts=1&offset=10'); foreach ($posts as $post) : start_wp(); ?>
	<?php static $count6 = 0; if ($count6 == "1") { break; } else { ?>

	    <div class="w-col w-col-4 home-portrait" style="<?php include (TEMPLATEPATH . '/includes/background.php' ); ?>" data-ix="mouse-over-titles">
	      <?php include (TEMPLATEPATH . '/includes/titleblock.php' ); ?>
	    </div>

	<?php $count6++; } ?>
	<?php endforeach; ?>


<!-- 	display post 12 -->
	<?php query_posts('showposts=1'); ?>
	<?php $posts = get_posts('numberposts=1&offset=11'); foreach ($posts as $post) : start_wp(); ?>
	<?php static $count61 = 0; if ($count61 == "1") { break; } else { ?>

	    <div class="w-col w-col-8 home-portrait" style="<?php include (TEMPLATEPATH . '/includes/background.php' ); ?>" data-ix="mouse-over-titles">
	        <?php include (TEMPLATEPATH . '/includes/titleblock.php' ); ?>
	    </div>

	<?php $count61++; } ?>
	<?php endforeach; ?>

</div>


<div class="w-row">

<!-- 	display post 13 -->
	<?php query_posts('showposts=1'); ?>
	<?php $posts = get_posts('numberposts=1&offset=12'); foreach ($posts as $post) : start_wp(); ?>
	<?php static $count7 = 0; if ($count7 == "1") { break; } else { ?>

	    <div class="w-col w-col-8 home-portrait" style="<?php include (TEMPLATEPATH . '/includes/background.php' ); ?>" data-ix="mouse-over-titles">
	      <?php include (TEMPLATEPATH . '/includes/titleblock.php' ); ?>
	    </div>

	<?php $count7++; } ?>
	<?php endforeach; ?>



<!-- 	display post 14 -->
	<?php query_posts('showposts=1'); ?>
	<?php $posts = get_posts('numberposts=1&offset=13'); foreach ($posts as $post) : start_wp(); ?>
	<?php static $count71 = 0; if ($count71 == "1") { break; } else { ?>

	    <div class="w-col w-col-4 home-portrait" style="<?php include (TEMPLATEPATH . '/includes/background.php' ); ?>" data-ix="mouse-over-titles">
	      <?php include (TEMPLATEPATH . '/includes/titleblock.php' ); ?>
	    </div>

	<?php $count71++; } ?>
	<?php endforeach; ?>

</div>


<?php if(get_field('mission_statement', 'option')): ?>

  <div class="w-section missionstatement">
    <div class="missionstatement-txt"><?php the_field('mission_statement', 'option'); ?></div>
  </div>

<?php endif; ?>



<?php get_footer(); // This fxn gets the footer.php file and renders it ?>







