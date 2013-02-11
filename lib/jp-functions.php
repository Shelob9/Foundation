<?php
wp_enqueue_style( 'fc-webicons', get_template_directory_uri().'/lib/fc-webicons.css' );

/* require( get_template_directory() . '/lib/slider/slider.php' ); */


//cpt tags fix
function wpse28145_add_custom_types( $query ) {
    if( is_tag() && empty( $query->query_vars['suppress_filters'] ) ) {

        // this gets all post types:
        $post_types = get_post_types();

        // alternately, you can add just specific post types using this line instead of the above:
        // $post_types = array( 'post', 'books' );


        $query->set( 'post_type', $post_types );
        return $query;
    }
}
add_filter( 'pre_get_posts', 'wpse28145_add_custom_types' );

//METABOXs. Require meta box plugin
//http://www.deluxeblogtips.com/meta-box/register-single-meta-box/
if( class_exists( 'RW_Meta_Box' ) ) {
add_action( 'admin_init', 'rw_register_meta_boxes' );
function rw_register_meta_boxes()
{
    $prefix = 'rw_';
    $meta_boxes = array();
    // Here is the code to define a meta box
    $meta_boxes[] = array(
        'title'    => 'ISBN for Amazon Affiliate Link',
        'pages'    => array( 'books' ),
        'fields' => array(
            array(
                'name' => 'url DO NOT USE',
                'id'   => $prefix . 'amz',
                'type' => 'text',
            ),
            array(
                'name' => 'ISBN-PAPERBACK',
                'id'   => $prefix . 'pamz',
                'type' => 'text',
            ),
            array(
                'name' => 'ISBN-KINDLE',
                'id'   => $prefix . 'kamz',
                'type' => 'text',
            ),
        )
    ); 
    $meta_boxes[] = array(
        'title'    => 'Subtitle',
        'pages'    => array( 'books' ),
        'fields' => array(
            array(
                'name' => 'Subtitle',
                'id'   => $prefix . 'subt',
                'type' => 'text',
            ),
        )
    );
    foreach ( $meta_boxes as $meta_box )
    {
        new RW_Meta_Box( $meta_box );
    }
}

} /*END IF EXISTS */
//quote shortcode
function quote( $atts, $content = null ) {  
    return '<blockquote><p>'.$content.'</p></blockquote>';  
}  
add_shortcode("quote", "quote"); 


//USED IN TOP NAV
// based on wp list categories from wp-includes/category-template.php. Beginning @ ~line 154
function get_it_good( $separator = '', $parents='', $post_id = false ) {
	global $wp_rewrite;
	if ( ! is_object_in_taxonomy( get_post_type( $post_id ), 'category' ) )
		return apply_filters( 'the_category', '', $separator, $parents );

	$categories = get_the_category( $post_id );
	if ( empty( $categories ) )
		return apply_filters( 'the_category', __( 'Uncategorized' ), $separator, $parents );

	$rel = ( is_object( $wp_rewrite ) && $wp_rewrite->using_permalinks() ) ? 'rel="category tag"' : 'rel="category"';

	$thelist = '';
	if ( '' == $separator ) {
		$thelist .= '<ul class="flyout">';
		foreach ( $categories as $category ) {
			$thelist .= "\n\t<li>";
			switch ( strtolower( $parents ) ) {
				case 'multiple':
					if ( $category->parent )
						$thelist .= get_category_parents( $category->parent, true, $separator );
					$thelist .= '<a href="' . esc_url( get_category_link( $category->term_id ) ) . '" title="' . esc_attr( sprintf( __( "View all posts in %s" ), $category->name ) ) . '" ' . $rel . '>' . $category->name.'</a></li>';
					break;
				case 'single':
					$thelist .= '<a href="' . esc_url( get_category_link( $category->term_id ) ) . '" title="' . esc_attr( sprintf( __( "View all posts in %s" ), $category->name ) ) . '" ' . $rel . '>';
					if ( $category->parent )
						$thelist .= get_category_parents( $category->parent, false, $separator );
					$thelist .= $category->name.'</a></li>';
					break;
				case '':
				default:
					$thelist .= '<a href="' . esc_url( get_category_link( $category->term_id ) ) . '" title="' . esc_attr( sprintf( __( "View all posts in %s" ), $category->name ) ) . '" ' . $rel . '>' . $category->name.'</a></li>';
			}
		}
		$thelist .= '</ul>';
	} else {
		$i = 0;
		foreach ( $categories as $category ) {
			if ( 0 < $i )
				$thelist .= $separator;
			switch ( strtolower( $parents ) ) {
				case 'multiple':
					if ( $category->parent )
						$thelist .= get_category_parents( $category->parent, true, $separator );
					$thelist .= '<a href="' . esc_url( get_category_link( $category->term_id ) ) . '" title="' . esc_attr( sprintf( __( "View all posts in %s" ), $category->name ) ) . '" ' . $rel . '>' . $category->name.'</a>';
					break;
				case 'single':
					$thelist .= '<a href="' . esc_url( get_category_link( $category->term_id ) ) . '" title="' . esc_attr( sprintf( __( "View all posts in %s" ), $category->name ) ) . '" ' . $rel . '>';
					if ( $category->parent )
						$thelist .= get_category_parents( $category->parent, false, $separator );
					$thelist .= "$category->name</a>";
					break;
				case '':
				default:
					$thelist .= '<a href="' . esc_url( get_category_link( $category->term_id ) ) . '" title="' . esc_attr( sprintf( __( "View all posts in %s" ), $category->name ) ) . '" ' . $rel . '>' . $category->name.'</a>';
			}
			++$i;
		}
	}
	return apply_filters( 'the_category', $thelist, $separator, $parents );
}
// Adding google + author meta
//http://yoast.com/wordpress-rel-author-rel-me/
function yoast_add_google_profile( $contactmethods ) {
// Add Google Profiles
  $contactmethods['google_profile'] = 'Google+ URL USE THIS ONE!';
  return $contactmethods;
	}
	add_filter( 'user_contactmethods', 'yoast_add_google_profile', 10, 1);
	
//Adding tumblr author meta
	function yoast_add_tumblr_profile( $contactmethods ) {
// Add tumblr Profiles
  $contactmethods['tumblr'] = 'tumblr username';
  return $contactmethods;
	}
	add_filter( 'user_contactmethods', 'yoast_add_tumblr_profile', 10, 1);
	
//shortcode for amazon affliate link
 
function amazon_link_function($atts, $content = null) {
   extract(shortcode_atts(array(
      "isbn" => 'isbn',
      "title" => 'title',
   ), $atts));
 
   return '<a href="http://www.amazon.com/exec/obidos/ASIN/'.$isbn.'/'.amazon_track().'/" title="'.$title.'" target="_blank">'.$title.'</a>';
  
}
add_shortcode("amazon-link", "amazon_link_function");
