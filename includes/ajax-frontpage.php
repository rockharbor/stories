<?php

function ajaxFetchPosts() {
    // Sanitize page value
    if ( !isset( $_GET['page'] ) ) {
        $page = null;
    } else {
        $page = intval( $_GET['page'] );
        if ( $page < 2 ) { $page = null; }
    }

    $stickyPosts = get_option( 'sticky_posts' );
    $args = array (
        'posts_per_page' => 14,
        'post__not_in' => $stickyPosts,
        'post_status' => 'publish',
        'ignore_sticky_posts' => 1,
        'paged' => $page
    );
    $my_query = new WP_Query( $args );
    $postsRemaining = $my_query->post_count; ?>

    <div class="w-row">
    <!-- 	display posts 1 thru 3 -->
    	<?php for ( $i = 0; ( $i < 3 ) && ( $postsRemaining > 0 ); $i++ ) {
            $my_query->the_post(); ?>

    	    <div class="w-col w-col-4 w-col-stack home-portrait linkable-article" style="<?php include (TEMPLATEPATH . '/includes/background.php' ); ?>" data-article-url="<?php the_permalink(); ?>" data-post-format="<?php echo get_post_format(); ?>">
    	        <?php include (TEMPLATEPATH . '/includes/titleblock.php' ); ?>
    	    </div>

    	<?php $postsRemaining--; } // end for ?>
    </div>

    <div class="w-row">
    <!--  display post 4 -->
    	<?php if ( $postsRemaining > 0 ) {
            $my_query->the_post(); ?>

    	    <div class="w-col w-col-4 home-portrait linkable-article" style="<?php include (TEMPLATEPATH . '/includes/background.php' ); ?>" data-article-url="<?php the_permalink(); ?>" data-post-format="<?php echo get_post_format(); ?>">
    		   <?php include (TEMPLATEPATH . '/includes/titleblock.php' ); ?>
    	    </div>

    	<?php $postsRemaining--; } // end if ?>


    <!-- 	 display post 5 -->
    	<?php if ( $postsRemaining > 0 ) {
            $my_query->the_post(); ?>

    	    <div class="w-col w-col-8 home-portrait linkable-article" style="<?php include (TEMPLATEPATH . '/includes/background.php' ); ?>" data-article-url="<?php the_permalink(); ?>" data-post-format="<?php echo get_post_format(); ?>">
    	      <?php include (TEMPLATEPATH . '/includes/titleblock.php' ); ?>
    	    </div>

    	<?php $postsRemaining--; } // end if ?>
    </div>


    <div class="w-row">
    <!-- 	display posts 6-8 -->
    	<?php for ( $i = 0; ( $i < 3 ) && ( $postsRemaining > 0 ); $i++ ) {
            $my_query->the_post(); ?>

    	    <div class="w-col w-col-4 w-col-stack home-portrait linkable-article" style="<?php include (TEMPLATEPATH . '/includes/background.php' ); ?>" data-article-url="<?php the_permalink(); ?>" data-post-format="<?php echo get_post_format(); ?>">
    	      <?php include (TEMPLATEPATH . '/includes/titleblock.php' ); ?>
    	    </div>

    	<?php $postsRemaining--; } // end for ?>

    </div>

    <div class="w-row">
    <!-- 	display post 9 -->
    	<?php if ( $postsRemaining > 0 ) {
            $my_query->the_post(); ?>

    	    <div class="w-col w-col-8 home-portrait linkable-article" style="<?php include (TEMPLATEPATH . '/includes/background.php' ); ?>" data-article-url="<?php the_permalink(); ?>" data-post-format="<?php echo get_post_format(); ?>">
    	      <?php include (TEMPLATEPATH . '/includes/titleblock.php' ); ?>
    	    </div>

    	<?php $postsRemaining--; } // end if ?>


    <!-- 	display post 10 -->
    	<?php if ( $postsRemaining > 0) {
            $my_query->the_post(); ?>

    	    <div class="w-col w-col-4 home-portrait linkable-article" style="<?php include (TEMPLATEPATH . '/includes/background.php' ); ?>" data-article-url="<?php the_permalink(); ?>" data-post-format="<?php echo get_post_format(); ?>">
    	      <?php include (TEMPLATEPATH . '/includes/titleblock.php' ); ?>
    	    </div>

    	<?php $postsRemaining--; } //end if ?>
    </div>


    <div class="w-row">
    <!-- 	display post 11 -->
    	<?php if ( $postsRemaining > 0 ) {
            $my_query->the_post(); ?>

    	    <div class="w-col w-col-4 home-portrait linkable-article" style="<?php include (TEMPLATEPATH . '/includes/background.php' ); ?>" data-article-url="<?php the_permalink(); ?>" data-post-format="<?php echo get_post_format(); ?>">
    	      <?php include (TEMPLATEPATH . '/includes/titleblock.php' ); ?>
    	    </div>

    	<?php $postsRemaining--; } // end if ?>


    <!-- 	display post 12 -->
    	<?php if ( $postsRemaining > 0 ) {
            $my_query->the_post(); ?>

    	    <div class="w-col w-col-8 home-portrait linkable-article" style="<?php include (TEMPLATEPATH . '/includes/background.php' ); ?>" data-article-url="<?php the_permalink(); ?>" data-post-format="<?php echo get_post_format(); ?>">
    	        <?php include (TEMPLATEPATH . '/includes/titleblock.php' ); ?>
    	    </div>

    	<?php $postsRemaining--; } // end if ?>

    </div>


    <div class="w-row last-row">

    <!-- 	display post 13 -->
    	<?php if ( $postsRemaining > 0 ) {
            $my_query->the_post(); ?>

    	    <div class="w-col w-col-8 home-portrait linkable-article" style="<?php include (TEMPLATEPATH . '/includes/background.php' ); ?>" data-article-url="<?php the_permalink(); ?>" data-post-format="<?php echo get_post_format(); ?>">
    	      <?php include (TEMPLATEPATH . '/includes/titleblock.php' ); ?>
    	    </div>

    	<?php $postsRemaining--; } // end if ?>



    <!-- 	display post 14 -->
    	<?php if ( $postsRemaining > 0 ) {
            $my_query->the_post(); ?>

    	    <div class="w-col w-col-4 home-portrait linkable-article" style="<?php include (TEMPLATEPATH . '/includes/background.php' ); ?>" data-article-url="<?php the_permalink(); ?>" data-post-format="<?php echo get_post_format(); ?>">
    	      <?php include (TEMPLATEPATH . '/includes/titleblock.php' ); ?>
    	    </div>

    	<?php $postsRemaining--; } // end if
    $nextPage = $prevPage = null; // default no pagination links
    $page = get_query_var( 'page', null );
    switch ( $page ) {
        case null: // we're on the home page
            $nextPage = 2; // next page 2, no previous page
            break;
        default: // we're on some other page
            $nextPage = ( $page < $my_query->max_num_pages ) ? $page + 1 : null; // if we have more pages, set next page link to current page plus 1
            $prevPage = $page - 1; // if we're not on homepage, we should always have a previous page
    }
    ?>
    </div>
<?php
die();
}

?>
