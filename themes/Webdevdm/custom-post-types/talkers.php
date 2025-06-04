<?php
function create_talkers_post_type() {
    $labels = array(
        'name'                  => _x( 'Talkers', 'Post type general name', 'talkers' ),
        'singular_name'         => _x( 'Talker', 'Post type singular name', 'talkers' ),
        'all_items' => __( 'All talkers', 'talkers' ),
        'add_new' => __( 'Add New', 'talkers' ),
    );
    $args = array(
        'labels'             => $labels,
        'description'        => 'Talkers custom post type.',
        'public'             => true,
        'supports'            => [ 'title', 'editor', 'thumbnail','excerpt' ],
        'show_in_menu'       => true,
        'query_var'          => true,
        'rewrite'            => array( 'slug' => 'talkers' ),
        'capability_type'    => 'post',
        'has_archive'        => true,
        'show_in_rest'       => true,
        'menu_icon'          => 'dashicons-admin-users'
    );

    register_post_type( 'talkers', $args );
}
