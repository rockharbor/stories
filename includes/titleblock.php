<?php if ( has_post_format( 'video' )) { ?>

	<div class="w-clearfix titleblock" <?php if ( is_single() ) { ?><?php	} else { ?>data-ix="mouse-over-title-origin"<?php } ?>>

    <div class="date">
      <div class="month"><?php the_time('M'); ?></div>
      <div class="day"><?php the_time('d'); ?></div>
      <div class="year"><?php the_time('Y'); ?></div>
    </div>
    <img class="icon" src="<?php bloginfo('template_directory'); ?>/images/video-outline.svg" width="24">
    <span class="category"><?php the_category(' '); ?></span>
    <a class="w-inline-block header-link" href="<?php the_permalink(); ?>">
        <h2 class="titleblock-h2"><?php the_title(); ?></h2>
    </a>
    <?php the_tags( '', ' ', ' ' ); ?>
</div>

<?php } elseif ( has_post_format( 'audio' )) { ?>

<div class="w-clearfix titleblock" <?php if ( is_single() ) { ?><?php	} else { ?>data-ix="mouse-over-title-origin"<?php } ?>>
    <div class="date">
      <div class="month"><?php the_time('M'); ?></div>
      <div class="day"><?php the_time('d'); ?></div>
      <div class="year"><?php the_time('Y'); ?></div>
    </div>
    <img class="icon" src="<?php bloginfo('template_directory'); ?>/images/microphone-outline.svg" width="24">
    <span class="category"><?php the_category(' '); ?></span>
    <a class="w-inline-block header-link" href="<?php the_permalink(); ?>">
        <h2 class="titleblock-h2"><?php the_title(); ?></h2>
    </a>
    <?php the_tags( '', ' ', ' ' ); ?>
</div>


<?php } elseif ( has_post_format( 'quote' )) { ?>


<div class="home-quoteblock">
	<div class="quote">“</div>
	<div class="quote-txt"><?php the_excerpt(); ?></div><a href="<?php the_field('social_media_handle'); ?>"></a>
</div>


<?php } elseif ( has_post_format( 'status' )) { ?>

<div class="home-quoteblock">
	<div class="quote">“</div>
	<div class="quote-txt"><?php the_excerpt(); ?></div><a href="<?php the_field('social_media_user_link'); ?>"><?php the_field('social_media_handle'); ?></a>
</div>

<?php } else { ?>

<div class="w-clearfix titleblock" <?php if ( is_single() ) { ?><?php	} else { ?>data-ix="mouse-over-title-origin"<?php } ?>>
    <div class="date">
      <div class="month"><?php the_time('M'); ?></div>
      <div class="day"><?php the_time('d'); ?></div>
      <div class="year"><?php the_time('Y'); ?></div>
    </div>
    <img class="icon" src="<?php bloginfo('template_directory'); ?>/images/clipboard.svg" width="24">
    <span class="category"><?php the_category(' '); ?></span>
    <a class="w-inline-block header-link" href="<?php the_permalink(); ?>">
        <h2 class="titleblock-h2"><?php the_title(); ?></h2>
    </a>
    <?php the_tags( '', ' ', ' ' ); ?>
</div>

<?php } ?>