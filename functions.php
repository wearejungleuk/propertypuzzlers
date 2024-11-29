<?php
/**
 Global functions for editing/adding to the core WordPress functionality, e.g.
 - Tidying up the WordPress Dashboard (CMS)
 - Protecting the WordPress system and the theme from potential security threats
 - Removing/editing unnecessary default WordPress theme functions (wp_head() etc.)
 - Registering custom post types and taxonomies
 - Registering custom widget/sidebar areas and shortcodes
 - Registering custom AJAX requests
 BE CAREFUL WITH WHAT YOU DO IN THIS AND ANY OTHER INCLUDED FILES!
*/

require_once('Controller/ContentElements.php');

// Enums.
require_once('functions/enums.php');

// Security setup.
// Add additional security measures to WordPress and the theme,
// including disabling the XML-RPC API and editing the default login error message(s)
require_once('functions/security-setup.php');

// Theme tidy-up.
// Remove/edit unnecessary core functionality/code from the theme and its functions,
// and also add additional functionality/code to the theme and its functions,
// e.g. clean up wp_head() and add a browser/OS CSS class to the <body> tag
require_once('functions/theme-tidy-up.php');
require_once('functions/enqueue-styles-and-scripts.php');
require_once('functions/widgets.php');
require_once('functions/utilities.php');
require_once('functions/acf-functions.php');
require_once('functions/misc.php');
require_once('functions/menus.php');
require_once('functions/image-sizes.php');