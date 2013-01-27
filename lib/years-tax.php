<?php 
/* created using http://themergency.com/generators/wordpress-custom-taxonomy/  */

add_action( 'init', 'register_taxonomy_years' );

function register_taxonomy_years() {

    $labels = array( 
        'name' => _x( 'Years', 'years' ),
        'singular_name' => _x( 'Year', 'years' ),
        'search_items' => _x( 'Search Years', 'years' ),
        'popular_items' => _x( 'Popular Years', 'years' ),
        'all_items' => _x( 'All Years', 'years' ),
        'parent_item' => _x( 'Parent Year', 'years' ),
        'parent_item_colon' => _x( 'Parent Year:', 'years' ),
        'edit_item' => _x( 'Edit Year', 'years' ),
        'update_item' => _x( 'Update Year', 'years' ),
        'add_new_item' => _x( 'Add New Year', 'years' ),
        'new_item_name' => _x( 'New Year', 'years' ),
        'separate_items_with_commas' => _x( 'Separate years with commas', 'years' ),
        'add_or_remove_items' => _x( 'Add or remove Years', 'years' ),
        'choose_from_most_used' => _x( 'Choose from most used Years', 'years' ),
        'menu_name' => _x( 'Years', 'years' ),
    );

    $args = array( 
        'labels' => $labels,
        'public' => true,
        'show_in_nav_menus' => false,
        'show_ui' => true,
        'show_tagcloud' => false,
        'hierarchical' => false,

        'rewrite' => true,
        'query_var' => true
    );

    register_taxonomy( 'years', array('books'), $args );
}
?>