<?php

/**
 * Post template for all individual posts of the Property Puzzler 2025 website theme
 * Outputs all of the main post content (text/images/comments etc.)
 * Finishes at the end of 'the loop' - the query that retrieves the current post content
 */

get_header();
if (have_posts()) :
	while (have_posts()) : the_post();
	endwhile;
endif;
get_footer();
