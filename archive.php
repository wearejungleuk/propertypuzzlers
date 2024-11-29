<?php

/**
 * Default Archive template for the Property Puzzler 2025 website theme
 * Outputs a list of posts, newest first, for any of the following pages: category/tag/taxonomy/CPT/author/date
 * This will be used when no other specific template(s) can be found (e.g. category.php)
 * Finishes at the end of 'the loop' - the query that outputs the posts
 */

get_header(); ?>
<div class="container main-content clearfix">
  <?php // Archive loop here.. 
  ?>
</div>
<?php get_footer();
