<?php
/**
 * Page
 *
 * Loop container for page content
 *
 * @package WordPress
 * @subpackage Foundation, for WordPress
 * @since Foundation, for WordPress 1.0
 */

get_header(); ?>

    <!-- Main Content -->
<?php include ('lib/open-main.php'); ?>

<?php 
//if authors: list authors , elseif fields: list fields, else: regular page template.
if ( is_page('authors') )
	{ ?>
	<?php if ( have_posts() ) : ?>
			<?php while ( have_posts() ) : the_post(); ?>
	<h2><a href="<?php the_permalink(); ?>" title="<?php echo esc_attr( sprintf( __( 'Permalink to %s', 'foundation' ), the_title_attribute( 'echo=0' ) ) ); ?>" rel="bookmark"><?php the_title(); ?></a></h2>
	<?php 
//list AUTHORS

$taxonomy     = 'author';
$orderby      = 'name'; 
$show_count   = 0;      // 1 for yes, 0 for no
$pad_counts   = 0;      // 1 for yes, 0 for no
$hierarchical = 1;      // 1 for yes, 0 for no
$title        = '';
$depth		= 0;

$args = array(
  'taxonomy'     => $taxonomy,
  'orderby'      => $orderby,
  'show_count'   => $show_count,
  'pad_counts'   => $pad_counts,
  'hierarchical' => $hierarchical,
  'title_li'     => $title,
  'depth' 		=> $depth
);
?>

<ul>
<?php wp_list_categories( $args ); ?>
</ul>
	
	<?php endwhile; ?>
		<?php endif; ?>
	<?php }
	
elseif ( is_page('fields') )
	{ ?>
	<?php if ( have_posts() ) : ?>
			<?php while ( have_posts() ) : the_post(); ?>
	<h2><a href="<?php the_permalink(); ?>" title="<?php echo esc_attr( sprintf( __( 'Permalink to %s', 'foundation' ), the_title_attribute( 'echo=0' ) ) ); ?>" rel="bookmark"><?php the_title(); ?></a></h2>
	<?php 
//list FIELDS
$taxonomy     = 'fields';
$orderby      = 'name'; 
$show_count   = 0;      // 1 for yes, 0 for no
$pad_counts   = 0;      // 1 for yes, 0 for no
$hierarchical = 1;      // 1 for yes, 0 for no
$title        = '';
$depth		= 0;

$args = array(
  'taxonomy'     => $taxonomy,
  'orderby'      => $orderby,
  'show_count'   => $show_count,
  'pad_counts'   => $pad_counts,
  'hierarchical' => $hierarchical,
  'title_li'     => $title,
  'depth' 		=> $depth
);
?>

<ul>
<?php wp_list_categories( $args ); ?>
</ul>
	
	<?php endwhile; ?>
		<?php endif; ?>
	<?php }
	
// REGULAR PAGES
else { ?>
		<?php if ( have_posts() ) : ?>
			<?php while ( have_posts() ) : the_post(); ?>
				<?php get_template_part( 'content', 'page' ); ?>
			<?php endwhile; ?>
		<?php endif; ?>
	<?php } ?>


    </div>
    </div>
    <!-- End Main Content -->

<?php get_sidebar(); ?>
<?php get_footer(); ?>