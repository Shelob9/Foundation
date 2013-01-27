<?php 
/* created using http://themergency.com/generators/wordpress-custom-taxonomy/  */

add_action( 'init', 'register_taxonomy_authors' );

function register_taxonomy_authors() {

    $labels = array( 
        'name' => _x( 'Author', 'author' ),
        'singular_name' => _x( 'Author', 'authors' ),
        'search_items' => _x( 'Search Authors', 'authors' ),
        'popular_items' => _x( 'Popular Authors', 'authors' ),
        'all_items' => _x( 'All Authors', 'authors' ),
        'parent_item' => _x( 'Parent Author', 'authors' ),
        'parent_item_colon' => _x( 'Parent Author:', 'authors' ),
        'edit_item' => _x( 'Edit Author', 'authors' ),
        'update_item' => _x( 'Update Author', 'authors' ),
        'add_new_item' => _x( 'Add New Author', 'authors' ),
        'new_item_name' => _x( 'New Author', 'authors' ),
        'separate_items_with_commas' => _x( 'Separate authors with commas', 'authors' ),
        'add_or_remove_items' => _x( 'Add or remove Authors', 'authors' ),
        'choose_from_most_used' => _x( 'Choose from most common Authors', 'authors' ),
        'menu_name' => _x( 'Authors', 'authors' ),
    );

    $args = array( 
        'labels' => $labels,
        'public' => true,
        'show_in_nav_menus' => true,
        'show_ui' => true,
        'show_tagcloud' => true,
        'hierarchical' => false,

        'rewrite' => true,
        'query_var' => true
    );

    register_taxonomy( 'author', array('books'), $args );
}
?>