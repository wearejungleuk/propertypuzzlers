<?php

/**
 * Generic page template of the Property Puzzler 2025 website theme
 * Outputs all of the main page content (text/images/menus etc.)
 * This will be used when no other specific template(s) can be found (e.g. page-{slug}.php)
 * Finishes at the end of 'the loop' - the query that gets the current page content
 */

get_header(); ?>
<div class="container main-content clearfix">
	<?php
	// Output the page content
	if (have_posts()) :
		while (have_posts()) : the_post();
			the_content();
		endwhile;
	endif;
	?>
</div>
<?php get_footer();
