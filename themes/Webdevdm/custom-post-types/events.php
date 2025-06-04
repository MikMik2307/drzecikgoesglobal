<?php
function create_events_post_type() {
    $labels = array(
        'name'                  => _x( 'Les editions precedentes', 'Post type general name', 'les-editions-precedentes' ),
        'singular_name'         => _x( 'Event', 'Post type singular name', 'events' ),
        'all_items' => __( 'All Events', 'events' ),
        'add_new' => __( 'Add New', 'events' ),
    );
    $args = array(
        'labels'             => $labels,
        'description'        => 'Events custom post type.',
        'public'             => true,
        'supports'            => [ 'title', 'editor', 'thumbnail' ],
        'show_in_menu'       => true,
        'query_var'          => true,
        'rewrite'            => array( 'slug' => 'les-editions-precedentes' ),
        'capability_type'    => 'post',
        'has_archive'        => true,
        'show_in_rest'       => true,
        'menu_icon'          => 'dashicons-calendar'
    );

    register_post_type( 'events', $args );
}

