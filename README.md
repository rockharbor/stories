# RH Stories Blog Theme

This WordPress theme has a tiled mosaic front page with prominently featured graphics, optional sticky hero image/post, and ACF-driven options.

## Usage

### Requirements

- This theme requires several plugins:
-- ACF Pro, which is not bundled and must be separately downloaded
-- Wufoo Shortcode plugin for embedding Wufoo forms
-- WP Custom Post Template plugin
- It uses the same S3 library as the ROCKHARBOR parent theme for optional S3 and Cloudfront integration, and this S3.php file is included
- It does NOT require the RH parent theme

### Miscellaneous

- This theme includes the Campus Nav side panel (Sidr) from the RH parent theme. In this theme, it is configurable through ACF.
- This theme has an optional hero image area at the top of the home page, which can be used by making ONE post "sticky". If you make no posts sticky, the mosaic tiles begin at the top of the page. If you make multiple posts sticky, the first post found will be displayed. Since this behavior is not predictible and can change as WordPress is updated, you should not make multiple posts sticky.
- You should set the posts per page option to 12 so the 3x4 layout on the category and tag archives is full
- Every post should have a large featured image. The images are displayed prominently and any post without a featured image will look out of place with a gray background.