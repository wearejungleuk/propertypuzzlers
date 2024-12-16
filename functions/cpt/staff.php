<?php

function register_staff_post_type() {
    $labels = array(
        'name'               => 'Staff',
        'singular_name'      => 'Staff Member',
        'menu_name'          => 'Staff',
        'name_admin_bar'     => 'Staff Member',
        'add_new'            => 'Add New',
        'add_new_item'       => 'Add New Staff Member',
        'new_item'           => 'New Staff Member',
        'edit_item'          => 'Edit Staff Member',
        'view_item'          => 'View Staff Member',
        'all_items'          => 'All Staff Members',
        'search_items'       => 'Search Staff',
        'not_found'          => 'No staff members found.',
        'not_found_in_trash' => 'No staff members found in Trash.',
    );

    $args = array(
        'labels'             => $labels,
        'public'             => true,
        'has_archive'        => true,
        'rewrite'            => array('slug' => 'staff'),
        'menu_icon'          => 'dashicons-groups', // Icon for Staff in admin menu
        'supports'           => array('title', 'custom-fields'),
        'show_in_rest'       => false, // Enables Gutenberg editor
    );

    register_post_type('staff', $args);
}
add_action('init', 'register_staff_post_type');

