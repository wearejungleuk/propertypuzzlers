<?php

/**
 * Page template for the Search results page of the Property Puzzler 2025 website theme
 * Outputs a list of results based on the user's search query
 * Finishes at the end of 'the loop' - the query that outputs the search results
 */

get_header(); ?>
<div class="container main-content misc-page clearfix">
	<?php
	if (have_posts()) { ?>
		<h1>Search results for "<?php echo get_search_query(); ?>"</h1>
		<?php
		while (have_posts()) : the_post();
		// Search results here..
		endwhile;
	} else {
		?>
		<h1>Sorry!</h1>
		<p>No results were found for "<?php echo get_search_query(); ?>". Please try another search term(s).</p>
	<?php
	}
	wp_reset_query();
	?>
</div>
<?php get_footer();
