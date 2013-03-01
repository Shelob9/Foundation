<?php


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
	
//Authors list
//http://www.wpbeginner.com/wp-tutorials/how-to-display-an-author-list-with-avatars-in-wordpress-contributors-page/
function contributors() {
global $wpdb;

$authors = $wpdb->get_results("SELECT ID, user_nicename from $wpdb->users WHERE display_name <> 'admin' ORDER BY display_name");

foreach ($authors as $author ) {

echo "<li>";
	echo '<div class="three columns">';
		echo "<a href=\"".get_bloginfo('url')."/author/";
		the_author_meta('user_nicename', $author->ID);
		echo "/\">";
		echo get_avatar($author->ID);
		echo "</a>";
	echo "</div>";
	echo '<div class="nine columns">';
		echo '<div class="row">';
			echo "<a href=\"";
			the_author_meta('user_url', $author->ID);
			echo "/\" target='_blank'>";
			the_author_meta('display_name', $author->ID);
			echo "</a>";
			echo "<br />";
			echo "<a href=\"";
			the_author_meta('user_url', $author->ID);
			echo "/\" target='_blank'>";
			echo "Website";
			echo "</a>";
			echo "<br />";
		echo '</div>';
		echo '<div class="row">';
			$google_profile = get_the_author_meta( 'google_profile', $author->ID );
			if ( $google_profile ) {
			echo '<a class="fc-webicon googleplus small" href="' . esc_url($google_profile) . '" rel="me"></a>';
			}
			
			$username = get_the_author_meta('tumblr', $author->ID);
			if ( $username != null ) {
			$a1 = "<a class=\"fc-webicon tumblr small\" href=\"http://";
			$a2 = ".tumblr.com\" ></a>";
			echo $a1.$username.$a2;
			}
			
			$username = get_the_author_meta('twitter', $author->ID);
			$a1 = "<a class=\"fc-webicon twitter small\" href=\"http://twitter.com/";
			$a2 = "\"></a>";
			if ( $username != null ) {
			echo $a1.$username.$a2;
			}
			
		echo '</div>';
		echo '<div class="row">';
			//echo "<a href=\"".get_bloginfo('url')."/author/";
			//the_author_meta('user_nicename', $author->ID);
			//echo "/\">Visit&nbsp;";
			//the_author_meta('display_name', $author->ID);
			//echo "'s Profile Page";
			//echo "</a>";
		echo '</div>';
	echo "</div>";
echo "</li>";
}
}
?>
