<?php
function register_property_post_type() {
    $labels = array(
        'name'               => 'Properties',
        'singular_name'      => 'Property',
        'menu_name'          => 'Properties',
        'name_admin_bar'     => 'Property',
        'add_new'            => 'Add New',
        'add_new_item'       => 'Add New Property',
        'new_item'           => 'New Property',
        'edit_item'          => 'Edit Property',
        'view_item'          => 'View Property',
        'all_items'          => 'All Properties',
        'search_items'       => 'Search Properties',
        'not_found'          => 'No properties found.',
        'not_found_in_trash' => 'No properties found in Trash.',
    );

    $args = array(
        'labels'             => $labels,
        'public'             => true,
        'has_archive'        => true,
        'rewrite'            => array('slug' => 'properties'),
        'menu_icon'          => 'dashicons-admin-home',
        'supports'           => array('title', 'custom-fields'),
        'show_in_rest'       => true, // Enables Gutenberg editor
    );

    register_post_type('property', $args);
}
add_action('init', 'register_property_post_type');

function register_property_taxonomies() {
    // Register Location Taxonomy
    $location_labels = array(
        'name'              => 'Locations',
        'singular_name'     => 'Location',
        'search_items'      => 'Search Locations',
        'all_items'         => 'All Locations',
        'parent_item'       => 'Parent Location',
        'parent_item_colon' => 'Parent Location:',
        'edit_item'         => 'Edit Location',
        'update_item'       => 'Update Location',
        'add_new_item'      => 'Add New Location',
        'new_item_name'     => 'New Location Name',
        'menu_name'         => 'Locations',
    );

    $location_args = array(
        'hierarchical'      => true, // Acts like categories
        'labels'            => $location_labels,
        'show_ui'           => true,
        'show_admin_column' => true,
        'query_var'         => true,
        'rewrite'           => array('slug' => 'location'),
        'show_in_rest'      => true, // Enables Gutenberg editor
    );

    register_taxonomy('location', 'property', $location_args);

    // Register Property Type Taxonomy
    $property_type_labels = array(
        'name'              => 'Property Types',
        'singular_name'     => 'Property Type',
        'search_items'      => 'Search Property Types',
        'all_items'         => 'All Property Types',
        'parent_item'       => 'Parent Property Type',
        'parent_item_colon' => 'Parent Property Type:',
        'edit_item'         => 'Edit Property Type',
        'update_item'       => 'Update Property Type',
        'add_new_item'      => 'Add New Property Type',
        'new_item_name'     => 'New Property Type Name',
        'menu_name'         => 'Property Types',
    );

    $property_type_args = array(
        'hierarchical'      => true, // Acts like categories
        'labels'            => $property_type_labels,
        'show_ui'           => true,
        'show_admin_column' => true,
        'query_var'         => true,
        'rewrite'           => array('slug' => 'property-type'),
        'show_in_rest'      => false, // Enables Gutenberg editor
    );

    register_taxonomy('property-type', 'property', $property_type_args);
}
add_action('init', 'register_property_taxonomies');