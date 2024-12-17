<?php
function register_testimonials_cpt() {
    $labels = array(
        'name'               => 'Testimonials',
        'singular_name'      => 'Testimonial',
        'menu_name'          => 'Testimonials',
        'add_new'            => 'Add New',
        'add_new_item'       => 'Add New Testimonial',
        'edit_item'          => 'Edit Testimonial',
        'new_item'           => 'New Testimonial',
        'view_item'          => 'View Testimonials',
        'search_items'       => 'Search Testimonials',
        'not_found'          => 'No Testimonials found',
        'not_found_in_trash' => 'No Testimonials found in Trash'
    );

    $args = array(
        'labels'              => $labels,
        'public'              => false, // Not public, prevents direct access to single posts
        'publicly_queryable'  => false, // Disable queryable single posts
        'show_ui'             => true,  // Show in the admin dashboard
        'show_in_menu'        => true,  // Show in the admin menu
        'query_var'           => false, // Disable query variable
        'rewrite'             => false, // Disable pretty permalinks
        'capability_type'     => 'post',
        'has_archive'         => false, // Disable archives
        'hierarchical'        => false,
        'menu_position'       => 20,
        'menu_icon'           => 'dashicons-testimonial', // Dashicon for admin menu
        'supports'            => array('title', 'editor'), // Fields supported
        'show_in_rest'        => false,  // Enable for Gutenberg
    );

    register_post_type('testimonials', $args);
}
add_action('init', 'register_testimonials_cpt');
