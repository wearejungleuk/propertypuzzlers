<?php

/**
 * Page template for all 404 (not found) pages of the Property Puzzler 2025 website theme
 * Outputs a user-friendly "page not found" message to inform users the page does not exist
 * Finishes after the output of the error message
 */

get_header(); ?>
<div class="container main-content misc-page clearfix">
  <h1>Sorry!</h1>
  <p>That page does not exist. Please <a href="<?php bloginfo('url'); ?>" title="Return to the Home page">go back</a> and try another page.</p>
</div>
<?php get_footer();
