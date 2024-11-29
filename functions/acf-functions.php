<?php
// Add ACF options area.
if ( function_exists( 'acf_add_options_page' ) ) {
	acf_add_options_page( 'Site Settings' );
}
/**
 * add social icon to wordpress menu list item
 */
function hrt_span_to_nav_menu( $item_output, $item, $depth, $args ) {
	// ACF vars
	$icon = get_field( 'social_icon', $item );
	
	if ( $icon ) {
		$item_output = '<a href="' . $item->url . '" target="' . $item->target . '">' . $icon . '</a>';
	}
	
	return $item_output;
}

add_filter( 'walker_nav_menu_start_el', 'hrt_span_to_nav_menu', 10, 4 );

/**
 * Filter ACF's Google Map field to apply a valid API key.
 */
//function my_acf_init() {
//    acf_update_setting( 'google_api_key', 'AIzaSyCa4bdTX7At7QaWM7ou59NsP7Fsjx7kqwU' );
//}
//
//add_action( 'acf/init', 'my_acf_init' );