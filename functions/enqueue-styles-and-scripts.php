<?php
/*** Enqueing Admin Styles & Scripts ***/
function load_admin_stylesheets() {
    wp_enqueue_style('admin', get_template_directory_uri() . '/dist/admin/admin.css');
    wp_enqueue_script('admin', get_template_directory_uri() . '/dist/admin/admin.js');
}

if (is_admin()) {
    add_action('admin_enqueue_scripts', 'load_admin_stylesheets');
}

/*** Enqueuing Styles & Scripts ***/
function load_stylesheets() {
    wp_enqueue_style('swipr-styles', 'https://cdn.jsdelivr.net/npm/swiper@10/swiper-bundle.min.css', array());
    wp_enqueue_style('main', get_template_directory_uri() . '/dist/index.css?debug=' . date('U'), false, '');
}

add_action('wp_enqueue_scripts', 'load_stylesheets');

function load_scripts() {
    wp_enqueue_script('swiper-scripts', 'https://cdn.jsdelivr.net/npm/swiper@10/swiper-bundle.min.js', false, '', true);
    wp_enqueue_script('index', get_template_directory_uri() . '/dist/index.js?debug=' . date('U'), false, '', true);
    wp_localize_script('index', 'indexJSVars', array(
            'ajaxurl' => admin_url('admin-ajax.php'),
        )
    );
}

add_action('wp_enqueue_scripts', 'load_scripts');