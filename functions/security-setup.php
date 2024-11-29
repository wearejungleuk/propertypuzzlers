<?php
/**
 * Security settings for the Northport Construction 2021 theme
 *
 */

// Remove WordPress' X-Pingback HTTP header.
// - Don't forget to disable access to the xmlrpc.php file in .htaccess!
function remove_x_pingback_header( $headers ) {
	unset( $headers['X-Pingback'] );

	return $headers;
}

add_filter( 'wp_headers', 'remove_x_pingback_header' );

// Edit the default error message on invalid login.
function failed_login() {
	return 'The login information you have entered is incorrect.';
}

add_filter( 'login_errors', 'failed_login' );


// Edit the default message on the 'Forgot Password' page.
function forgotpassword_message() {
	if ( isset( $_REQUEST['action'] ) ) {
		$action = $_REQUEST['action'];
		if ( $action == 'lostpassword' ) {
			$message = '<p class="message">If the username entered is correct, you will receive further instructions via email.</p>';

			return $message;
		}
	}
}

add_filter( 'login_message', 'forgotpassword_message' );