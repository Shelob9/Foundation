<?php 
/* created using http://themergency.com/generators/wordpress-custom-taxonomy/  */

add_action( 'init', 'register_taxonomy_fields' );

function register_taxonomy_fields() {

    $labels = array( 
        'name' => _x( 'Fields', 'fields' ),
        'singular_name' => _x( 'Field', 'fields' ),
        'search_items' => _x( 'Search Fields', 'fields' ),
        'popular_items' => _x( 'Popular Fields', 'fields' ),
        'all_items' => _x( 'All Fields', 'fields' ),
        'parent_item' => _x( 'Parent Field', 'fields' ),
        'parent_item_colon' => _x( 'Parent Field:', 'fields' ),
        'edit_item' => _x( 'Edit Field', 'fields' ),
        'update_item' => _x( 'Update Field', 'fields' ),
        'add_new_item' => _x( 'Add New Field', 'fields' ),
        'new_item_name' => _x( 'New Field', 'fields' ),
        'separate_items_with_commas' => _x( 'Separate fields with commas', 'fields' ),
        'add_or_remove_items' => _x( 'Add or remove fields', 'fields' ),
        'choose_from_most_used' => _x( 'Choose from the most used fields', 'fields' ),
        'menu_name' => _x( 'Fields', 'fields' ),
    );

    $args = array( 
        'labels' => $labels,
        'public' => true,
        'show_in_nav_menus' => true,
        'show_ui' => true,
        'show_tagcloud' => true,
        'hierarchical' => true,

        'rewrite' => true,
        'query_var' => true
    );

    register_taxonomy( 'fields', array('books'), $args );
}

?>