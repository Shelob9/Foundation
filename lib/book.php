<?php
/* CREATED USING:  http://themergency.com/generators/wordpress-custom-post-types/ */

add_action( 'init', 'register_cpt_books' );

function register_cpt_books() {

    $labels = array( 
        'name' => _x( 'Book', 'books' ),
        'singular_name' => _x( 'Books', 'books' ),
        'add_new' => _x( 'Add New', 'books' ),
        'add_new_item' => _x( 'Add New Books', 'books' ),
        'edit_item' => _x( 'Edit Books', 'books' ),
        'new_item' => _x( 'New Books', 'books' ),
        'view_item' => _x( 'View Books', 'books' ),
        'search_items' => _x( 'Search Book', 'books' ),
        'not_found' => _x( 'No book found', 'books' ),
        'not_found_in_trash' => _x( 'No book found in Trash', 'books' ),
        'parent_item_colon' => _x( 'Parent Books:', 'books' ),
        'menu_name' => _x( 'Book', 'books' ),
    );

    $args = array( 
        'labels' => $labels,
        'hierarchical' => false,
        
        'supports' => array( 'title', 'editor', 'excerpt', 'author', 'thumbnail', 'revisions', 'comments'),
        'taxonomies' => array( 'page-category', 'author', 'fields', 'years', 'post_tag' ),
        'public' => true,
        'show_ui' => true,
        'show_in_menu' => true,
        'menu_position' => 5,
        
        'show_in_nav_menus' => true,
        'publicly_queryable' => true,
        'exclude_from_search' => false,
        'has_archive' => true,
        'query_var' => true,
        'can_export' => true,
        'rewrite' => true,
        'capability_type' => 'post'
    );

    register_post_type( 'books', $args );
}
?>