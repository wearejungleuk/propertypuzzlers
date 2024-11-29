<?php

/**
 * Year shortcode
 */
function year_shortcode() {
    $year = date( 'Y' );

    return $year;
}

add_shortcode( 'year', 'year_shortcode' );



// Add some indents to wp_head() and wp_footer() for nicely-formatted HTML.
function indented_html( $function ) {
    ob_start();
    call_user_func( $function );
    $html = ob_get_contents();
    ob_end_clean();
    echo preg_replace( "/\n/", "\n\t\t", substr( $html, 0, - 1 ) );
    echo "\n";
}

// Remove <p> tags that wrap images and links in WYSIWYG content.
function remove_p_tags_from_images( $content ) {
    return preg_replace( '/<p>\s*(<a .*>)?\s*(<img .* \/>)\s*(<\/a>)?\s*<\/p>/iU', '\1\2\3', $content );
}

add_filter( 'the_content', 'remove_p_tags_from_images', 10 );
add_filter( 'acf_the_content', 'remove_p_tags_from_images', 11 );
add_filter( 'widget_text', 'remove_p_tags_from_images', 10 );

function remove_p_tags_from_links( $content ) {
    return preg_replace( '/<p>\s*(<a .*>*.<\/a>)\s*<\/p>/iU', '\1', $content );
}

add_filter( 'the_content', 'remove_p_tags_from_links', 20 );
add_filter( 'acf_the_content', 'remove_p_tags_from_links', 20 );
add_filter( 'widget_text', 'remove_p_tags_from_links', 20 );

// Add a wrapper <div> around all <table> tags (for presentational & responsive purposes).
// Sourced and edited from https://stackoverflow.com/a/40328327.
function add_table_wrapper( $content ) {
    if ( ! is_admin() && preg_match( '~<table.*?</table>~is', $content ) ) {
        $content = preg_replace_callback( '~<table.*?</table>~is', 'add_wrapper', $content );
    }

    return $content;
}

add_filter( 'the_content', 'add_table_wrapper', 30 );
add_filter( 'acf_the_content', 'add_table_wrapper', 30 );
add_filter( 'widget_text', 'add_table_wrapper', 30 );

function add_wrapper( $matches ) {
    return '<div class="table-wrap clearfix">' . "\n" . '' . $matches[0] . '' . "\n" . '</div>';
}

// Remove <p> tags that wrap shortcodes in widgets.

function remove_p_tags_from_shortcodes( $content ) {
    $content = preg_replace( '/(<p>)\s*(<nav)/', '<nav', $content );
    $content = preg_replace( '/(<\/nav>)\s*(<\/p>)/', '</nav>', $content );

    return $content;
}

add_filter( 'widget_text', 'remove_p_tags_from_shortcodes', 40 );

// Allow shortcodes in Contact Form 7.
function cf7_allow_shortcodes( $form ) {
    $form = do_shortcode( $form );

    return $form;
}

add_filter( 'wpcf7_form_elements', 'cf7_allow_shortcodes' );

// Add menu levels to all menus.
add_filter( 'wp_nav_menu_objects', 'my_menu_class' );
function my_menu_class( $menu ) {
    $level = 0;
    $stack = array( '0' );
    foreach ( $menu as $key => $item ) {
        while ( $item->menu_item_parent != array_pop( $stack ) ) {
            $level --;
        }
        $level ++;
        $stack[]                 = $item->menu_item_parent;
        $stack[]                 = $item->ID;
        $menu[ $key ]->classes[] = 'level-' . ( $level - 1 );
    }

    return $menu;
}

// Add a wrapper <div> around all <iframe> tags (for presentational & responsive purposes).
function add_iframe_wrapper( $content ) {
    if ( ! is_admin() && preg_match( '~<iframe.*?</iframe>~is', $content ) ) {
        $content = preg_replace_callback( '~<iframe.*?</iframe>~is', 'add_frame_wrapper', $content );
    }

    return $content;
}

add_filter( 'the_content', 'add_iframe_wrapper', 30 );
add_filter( 'acf_the_content', 'add_iframe_wrapper', 30 );
add_filter( 'widget_text', 'add_iframe_wrapper', 30 );

function add_frame_wrapper( $matches ) {
    return '<div class="iframe-wrap clearfix">' . "\n" . '' . $matches[0] . '' . "\n" . '</div>';
}

// Add browser/OS name to body classes.
function browser_body_class( $classes ) {
    global $is_lynx, $is_gecko, $is_IE, $is_edge, $is_opera, $is_NS4, $is_safari, $is_chrome, $is_iphone;

    if ( $is_lynx ) {
        $classes[] = 'lynx';
    } elseif ( $is_gecko ) {
        $classes[] = 'firefox';
    } elseif ( $is_opera ) {
        $classes[] = 'opera';
    } elseif ( $is_NS4 ) {
        $classes[] = 'ns4';
    } elseif ( $is_safari ) {
        $classes[] = 'safari';
    } elseif ( $is_chrome ) {
        $classes[] = 'chrome';
    } elseif ( $is_edge ) {
        $classes[] = 'edge';
    } elseif ( $is_IE ) {
        $classes[] = 'ie';
        if ( preg_match( '/MSIE ([0-9]+)([a-zA-Z0-9.]+)/', $_SERVER['HTTP_USER_AGENT'], $browser_version ) ) {
            $classes[] = 'ie' . $browser_version[1];
        }
    } else {
        $classes[] = 'unknown';
    }
    if ( $is_iphone ) {
        $classes[] = 'iphone';
    }
    if ( stristr( $_SERVER['HTTP_USER_AGENT'], "mac" ) ) {
        $classes[] = 'mac';
    } elseif ( stristr( $_SERVER['HTTP_USER_AGENT'], "linux" ) ) {
        $classes[] = 'linux';
    } elseif ( stristr( $_SERVER['HTTP_USER_AGENT'], "windows" ) ) {
        $classes[] = 'windows';
    }
    if ( wp_is_mobile() ) {
        $classes[] = 'is-mobile';
    } else {
        $classes[] = 'is-desktop';
    }

    return $classes;
}

add_filter( 'body_class', 'browser_body_class' );