<?php
/**
 * Theme tidy up for all stuff that goes in the WordPress dashboard and some front end functions.
 *
 */

function dashboard_setup() {
	// Remove WordPress' default content editor field.
	function remove_content_field() {
		remove_post_type_support( 'page', 'editor' );
		remove_post_type_support( 'post', 'editor' );
		// Add your custom post types here (if required)..
	}

	add_action( 'init', 'remove_content_field', 100 );

	// Enable WordPress menus
	add_theme_support( 'menus' );

	// Set WordPress images in WYSIWYG editor's default display settings:.
	// Alignment: None.
	// Size: Full Size.
	// Link to: None.
	function image_display_settings() {
		update_option( 'image_default_align', 'none' );
		update_option( 'image_default_size', 'full' );
		update_option( 'image_default_link_type', 'none' );
	}

	add_action( 'admin_init', 'image_display_settings', 10 );

	// Remove WordPress' default image sizes (except for thumbnail).
	function remove_default_image_sizes( $sizes ) {
		unset( $sizes['medium'] );
		unset( $sizes['medium_large'] );
		unset( $sizes['large'] );

		return $sizes;
	}

	add_filter( 'intermediate_image_sizes_advanced', 'remove_default_image_sizes' );

	// Move the Yoast SEO panel to the bottom of all page/post edit screens.
	function yoast_to_bottom() {
		return 'low';
	}

	add_filter( 'wpseo_metabox_prio', 'yoast_to_bottom' );

	// Change the default labels etc. of the 'Posts' post type.
	function change_posts_sidebar_labels() {
		global $menu;
		global $submenu;

		$menu[5][0]                 = 'Blog Posts'; // Change 'Posts' to 'Blog Posts'
		$menu[5][6]                 = 'dashicons-welcome-write-blog'; // Change the Blog Posts dashicon
		$submenu['edit.php'][5][0]  = 'All Blog Posts';
		$submenu['edit.php'][10][0] = 'Add New Blog Post';
		$submenu['edit.php'][15][0] = 'Blog Categories'; // Change the 'Categories' text
	}

	add_action( 'admin_menu', 'change_posts_sidebar_labels' );

	// Remove the 'Comments' links from the admin sidebar and topbar.
	function remove_comments_sidebar_link() {
		remove_menu_page( 'edit-comments.php' );
	}

	add_action( 'admin_menu', 'remove_comments_sidebar_link' );

	function remove_comments_topbar_link( $wp_admin_bar ) {
		$wp_admin_bar->remove_menu( 'comments' );
	}

	add_action( 'admin_bar_menu', 'remove_comments_topbar_link', 999 );

	// Remove the 'Customizer' links from the admin sidebar and topbar.
	function remove_customizer_sidebar_link() {
		global $submenu;
		unset( $submenu['themes.php'][6] );
	}

	add_action( 'admin_menu', 'remove_customizer_sidebar_link' );

	function remove_customizer_topbar_link( $wp_admin_bar ) {
		$wp_admin_bar->remove_menu( 'customize' );
	}

	add_action( 'admin_bar_menu', 'remove_customizer_topbar_link', 999 );

	// Reorder the links in the admin sidebar.
	/* Sourced from: http://wordpress.stackexchange.com/a/141724 */
	function reorder_sidebar_links( $menu_ord ) {
		if ( ! $menu_ord ) {
			return true;
		}

		return array(
			'index.php', // Dashboard
			'separator1', // First separator
			'edit.php?post_type=page', // Pages
			// Custom post types here..
			'edit.php', // Posts
			'upload.php', // Media
			'wpcf7', // Contact form 7
			'flamingo', // Flamingo
			// ACF options pages
			'wpseo_dashboard', // Yoast
			'separator2', // Second separator
			'themes.php', // Appearance
			'plugins.php', // Plugins
			'users.php', // Users
			'tools.php', // Tools
			'options-general.php', // Settings
			'edit.php?post_type=acf-field-group', // ACF
			'Wordfence', // Wordfence
			'separator-last' // Last separator
		);
	}

	add_filter( 'custom_menu_order', 'reorder_sidebar_links' );
	add_filter( 'menu_order', 'reorder_sidebar_links' );

	// Disallow theme/plugin file editing from within WordPress.
	define( 'DISALLOW_FILE_EDIT', true );

	// Remove the admin bar for all users.
	show_admin_bar( false );

}

add_action( 'after_setup_theme', 'dashboard_setup' );

// Deregister the 'tags' default taxonomy.
function deregister_tags_taxonomy() {
	register_taxonomy( 'post_tag', array() );
}

add_action( 'init', 'deregister_tags_taxonomy' );

// Tidy up the wp_head() function.
function tidy_up_wp_head() {
	// Remove RSS feed links (posts/comments/categories)
	remove_action( 'wp_head', 'feed_links', 2 );
	remove_action( 'wp_head', 'feed_links_extra', 3 );
	// Remove RSD EditURI link
	remove_action( 'wp_head', 'rsd_link' );
	// Remove Windows Live Writer link
	remove_action( 'wp_head', 'wlwmanifest_link' );
	// Remove index link
	remove_action( 'wp_head', 'index_rel_link' );
	// Remove previous link
	remove_action( 'wp_head', 'parent_post_rel_link', 10, 0 );
	// Remove start link
	remove_action( 'wp_head', 'start_post_rel_link', 10, 0 );
	// Remove 'prev'/'next' post links
	remove_action( 'wp_head', 'adjacent_posts_rel_link_wp_head', 10, 0 );
	// Remove canonical link
	remove_action( 'wp_head', 'rel_canonical', 10, 0 );
	// Remove shortlink link
	remove_action( 'wp_head', 'wp_shortlink_wp_head', 10, 0 );
	// Remove WordPress generator/version link
	remove_action( 'wp_head', 'wp_generator' );
	// Remove inline styles for recent post comments
	global $wp_widget_factory;
	remove_action( 'wp_head', array(
		$wp_widget_factory->widgets['WP_Widget_Recent_Comments'],
		'recent_comments_style'
	) );

	// Remove emoji styles/scripts
	remove_action( 'wp_head', 'print_emoji_detection_script', 7 );
	remove_action( 'wp_print_styles', 'print_emoji_styles' );

	// Remove WordPress version from stylesheets/scripts query strings
	function remove_wp_ver_css_js( $src ) {
		if ( strpos( $src, 'ver=' ) ) {
			$src = remove_query_arg( 'ver', $src );
		}

		return $src;
	}

	add_filter( 'style_loader_src', 'remove_wp_ver_css_js', 9999 );
	add_filter( 'script_loader_src', 'remove_wp_ver_css_js', 9999 );
	// Remove WordPress version from RSS feed
	function remove_wp_ver_rss() {
		return '';
	}

	add_filter( 'the_generator', 'remove_wp_ver_rss' );
}

add_action( 'init', 'tidy_up_wp_head' );



