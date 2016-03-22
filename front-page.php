<?php
/**
 * 	Template Name: Home Page

*/
get_header();  ?>






<!-- display the STICKY post -->
<?php
/* Displays one sticky post on the first page of results (first one DB query returns)
 * If no sticky is set, or if on other page, display nothing.
*/
$page = get_query_var( 'page', null );
$stickyPosts = get_option( 'sticky_posts' );
if ( isset( $stickyPosts[0] ) && !( $page >= 2 ) ) { // If there is at least one sticky post and we're on the first page of results, display the FIRST sticky post in the hero position
    $args = array(
        'post_per_page' => 1,
        'post__in' => $stickyPosts,
        'post_status' => 'publish',
        'ignore_sticky_posts' => 1
    );
    $stickyQuery = new WP_Query( $args );
    if ( $stickyQuery->have_posts() ) {
        $stickyQuery->the_post();
        $postFormat = get_post_format();
        switch ( $postFormat ) {
            case 'video':
                $iconUrl = '/images/video-outline.svg';
                break;
            case 'audio':
                $iconUrl = '/images/microphone-outline.svg';
                break;
            default:
                $iconUrl = '/images/clipboard.svg';
        } ?>
<div class="w-section header" style="<?php include ( TEMPLATEPATH . '/includes/background.php' ); ?>">
    <div class="w-container hero">
        <img class="icon" src="<?php echo get_bloginfo( 'template_directory' ) . $iconUrl; ?>" width="24">
        <span class="category"><?php the_category( ' ' ); ?></span>
        <a class="w-inline-block header-link" href="<?php the_permalink(); ?>"><h1><?php the_title(); ?></h1></a>
        <div class="w-clearfix">
            <div class="date">
                <div class="month"><?php the_time( 'M' ); ?></div>
                <div class="day"><?php the_time( 'd' ); ?></div>
                <div class="year"><?php the_time( 'Y' ); ?></div>
            </div>
            <p class="hero-p"><?php the_excerpt(); ?></p>
            <?php the_tags( '', ' ', ' ' ); ?>
        </div>
    </div>
</div>
<?php
    }
}

$args = array( // 14 posts per page, don't duplicate sticky posts, and only show published posts
    'posts_per_page' => 14,
    'post__not_in' => $stickyPosts,
    'post_status' => 'publish'
);
if ( ! is_null( $page ) ) { // if we are on a page, only retrieve those posts
    $args['paged'] = $page;
}
$my_query = new WP_Query( $args );
$postsRemaining = $my_query->post_count; ?>

<div class="w-row">
<!-- 	display posts 1 thru 3 -->
	<?php for ( $i = 0; ( $i < 3 ) && ( $postsRemaining > 0 ); $i++ ) {
        $my_query->the_post(); ?>

	    <div class="w-col w-col-4 w-col-stack home-portrait" style="<?php include (TEMPLATEPATH . '/includes/background.php' ); ?>" data-ix="mouse-over-titles">
	        <?php include (TEMPLATEPATH . '/includes/titleblock.php' ); ?>
	    </div>

	<?php $postsRemaining--; } // end for ?>
</div>

<div class="w-row">
<!--  display post 4 -->
	<?php if ( $postsRemaining > 0 ) {
        $my_query->the_post(); ?>

	    <div class="w-col w-col-4 home-portrait" style="<?php include (TEMPLATEPATH . '/includes/background.php' ); ?>" data-ix="mouse-over-titles">
		   <?php include (TEMPLATEPATH . '/includes/titleblock.php' ); ?>
	    </div>

	<?php $postsRemaining--; } // end if ?>


<!-- 	 display post 5 -->
	<?php if ( $postsRemaining > 0 ) {
        $my_query->the_post(); ?>

	    <div class="w-col w-col-8 home-portrait" style="<?php include (TEMPLATEPATH . '/includes/background.php' ); ?>" data-ix="mouse-over-titles">
	      <?php include (TEMPLATEPATH . '/includes/titleblock.php' ); ?>
	    </div>

	<?php $postsRemaining--; } // end if ?>
</div>


<div class="w-row">
<!-- 	display posts 6-8 -->
	<?php for ( $i = 0; ( $i < 3 ) && ( $postsRemaining > 0 ); $i++ ) {
        $my_query->the_post(); ?>

	    <div class="w-col w-col-4 w-col-stack home-portrait" style="<?php include (TEMPLATEPATH . '/includes/background.php' ); ?>" data-ix="mouse-over-titles">
	      <?php include (TEMPLATEPATH . '/includes/titleblock.php' ); ?>
	    </div>

	<?php $postsRemaining--; } // end for ?>

</div>

<div class="w-row">
<!-- 	display post 9 -->
	<?php if ( $postsRemaining > 0 ) {
        $my_query->the_post(); ?>

	    <div class="w-col w-col-8 home-portrait" style="<?php include (TEMPLATEPATH . '/includes/background.php' ); ?>" data-ix="mouse-over-titles">
	      <?php include (TEMPLATEPATH . '/includes/titleblock.php' ); ?>
	    </div>

	<?php $postsRemaining--; } // end if ?>


<!-- 	display post 10 -->
	<?php if ( $postsRemaining > 0) {
        $my_query->the_post(); ?>

	    <div class="w-col w-col-4 home-portrait" style="<?php include (TEMPLATEPATH . '/includes/background.php' ); ?>" data-ix="mouse-over-titles">
	      <?php include (TEMPLATEPATH . '/includes/titleblock.php' ); ?>
	    </div>

	<?php $postsRemaining--; } //end if ?>
</div>


<div class="w-row">
<!-- 	display post 11 -->
	<?php if ( $postsRemaining > 0 ) {
        $my_query->the_post(); ?>

	    <div class="w-col w-col-4 home-portrait" style="<?php include (TEMPLATEPATH . '/includes/background.php' ); ?>" data-ix="mouse-over-titles">
	      <?php include (TEMPLATEPATH . '/includes/titleblock.php' ); ?>
	    </div>

	<?php $postsRemaining--; } // end if ?>


<!-- 	display post 12 -->
	<?php if ( $postsRemaining > 0 ) {
        $my_query->the_post(); ?>

	    <div class="w-col w-col-8 home-portrait" style="<?php include (TEMPLATEPATH . '/includes/background.php' ); ?>" data-ix="mouse-over-titles">
	        <?php include (TEMPLATEPATH . '/includes/titleblock.php' ); ?>
	    </div>

	<?php $postsRemaining--; } // end if ?>

</div>


<div class="w-row">

<!-- 	display post 13 -->
	<?php if ( $postsRemaining > 0 ) {
        $my_query->the_post(); ?>

	    <div class="w-col w-col-8 home-portrait" style="<?php include (TEMPLATEPATH . '/includes/background.php' ); ?>" data-ix="mouse-over-titles">
	      <?php include (TEMPLATEPATH . '/includes/titleblock.php' ); ?>
	    </div>

	<?php $postsRemaining--; } // end if ?>



<!-- 	display post 14 -->
	<?php if ( $postsRemaining > 0 ) {
        $my_query->the_post(); ?>

	    <div class="w-col w-col-4 home-portrait" style="<?php include (TEMPLATEPATH . '/includes/background.php' ); ?>" data-ix="mouse-over-titles">
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
    <div class="w-section w-clearfix older-newer-posts">
    <?php if ( $prevPage > 1 ) { /* regular previous page link */ ?>
        <a href="/page/<?php echo $prevPage; ?>/" class="button older-button">Newer Posts</a>
    <?php } else if ( $prevPage == 1 ) { /* we don't want a /page/1/ url, so just go back to homepage */ ?>
        <a href="<?php echo get_home_url(); ?>" class="button older-button">Newer Posts</a>
    <?php }
    if ( isset( $nextPage ) ) { ?>
        <a href="/page/<?php echo $nextPage; ?>/" class="button newer-button">More Posts</a>
    <?php } ?>
    </div>
</div>


<?php if(get_field('mission_statement', 'option')): ?>

  <div class="w-section missionstatement">
    <div class="missionstatement-txt"><?php the_field('mission_statement', 'option'); ?></div>
  </div>

<?php endif; ?>



<?php get_footer(); // This fxn gets the footer.php file and renders it ?>
