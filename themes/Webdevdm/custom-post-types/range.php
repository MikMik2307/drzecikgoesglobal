<?php
function create_range_post_type() {
    $labels = array(
        'name'                  => _x( 'Range','Post type general name', 'range' ),
        'singular_name'         => _x( 'Range', 'Post type singular name', 'range' ),
        'all_items' => __( 'All range', 'range' ),
        'add_new' => __( 'Add New', 'range' ),
    );
    $args = array(
        'labels'             => $labels,
        'description'        => 'Range custom post type.',
        'public'             => true,
        'supports'            => [ 'title', 'editor', 'thumbnail' ],
        'show_in_menu'       => true,
        'query_var'          => true,
        'rewrite'            => array( 'slug' => 'range' ),
        'capability_type'    => 'post',
        'has_archive'        => true,
        'show_in_rest'       => true,
        'menu_icon'          => 'dashicons-admin-post'
    );

    register_post_type( 'range', $args );
}
