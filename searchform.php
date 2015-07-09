<div class="w-form searchbox">
  <form class="w-clearfix searchform" id="email-form-2" role="search" method="get" action="<?php echo home_url( '/' ); ?>">
    <input class="w-input search-field" id="name-3" type="text" placeholder="Search for a story" value="<?php echo get_search_query() ?>" name="s" title="<?php echo esc_attr_x( 'Search for:', 'label' ) ?>" required="required">
    <input class="w-button searchbutton" type="submit" value="<?php echo esc_attr_x( 'Search', 'submit button' ) ?>" data-wait="Please wait...">
  </form>
  <div class="w-form-done">
    <p>Thank you! Your submission has been received!</p>
  </div>
  <div class="w-form-fail">
    <p>Oops! Something went wrong while submitting the form</p>
  </div>
</div>