<?php

/**
 * Page template for all default pages of the Property Puzzler 2025 website theme
 * Outputs all of the main page content (text/images/menus etc.)
 * Finishes at the end of 'the loop' - the query that gets the current page content
 */

get_header();

$modules = get_field('modules');
if ($modules) {
    $elem = new ContentElements();
    $modNum = 1;
    foreach ($modules as $m) {
        include(locate_template('modules/' . $m['acf_fc_layout'] . '.php'));
        $modNum++;
    }
}

get_footer();
