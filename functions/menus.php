<?php
/**
 * Set menu types.
 */
function wpb_custom_new_menu() {
    register_nav_menu('header-menu',__( 'Header Menu' ));
    register_nav_menu('second-header-menu',__( 'Second Header Menu' ));
}
add_action( 'init', 'wpb_custom_new_menu' );