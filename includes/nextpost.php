<?php
if ( have_rows( 'adjacent_post_excluded_taxonomies', 'option' ) ) {
    $excludedTaxIds = array();
    while ( have_rows( 'adjacent_post_excluded_taxonomies', 'option' ) ) {
        the_row();
        $slug = get_sub_field( 'slug' );
        if ( $taxObj = get_term_by( 'slug', $slug, 'post_format' ) ) {
            $excludedTaxIds[] = (int) $taxObj->term_id;
        }
    }
}
?>
<div class="w-section w-clearfix older-newer-posts">
    <div class="button older-button"><?php next_post_link( '%link', 'Previous Story', false, $excludedTaxIds ); ?></div>
    <div class="button newer-button"><?php previous_post_link( '%link', 'Next Story', false, $excludedTaxIds ); ?></div>
</div>