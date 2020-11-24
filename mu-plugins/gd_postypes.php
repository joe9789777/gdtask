<?php
/**
 * Registering custom post type campaign
 * 
 */
function gd_post_types(){
    register_post_type('campaign',[
        'show_in_rest' => true,
        'public' => false,
        'publicly_queryable' => true,
        'show_ui' => true,
        'exclude_from_search' => true,
        'show_in_nav_menus' => false,
        'has_archive' => false,
        'rewrite' => false,
        'menu_icon' => 'dashicons-admin-site-alt2',
        'labels' => [
            'name' => 'Campaings',
            'add_new_item' => "Add New Campaign",
            'edit_item' => 'Edit Campaign',
            'all_items' => "All Campaings",
            'singular_name' => 'Campaign'
        ],
        'supports' => array( 'title')
    ]); 
}

add_action('init','gd_post_types');

