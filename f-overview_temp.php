<?php
/*
Template Name: Field Overview Template
*/
?>

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

<?php if ( have_posts() ) : ?>
			<?php while ( have_posts() ) : the_post(); ?>
			
<article>

	<header>
		<hgroup class="row">
			<h2><a href="<?php the_permalink(); ?>" title="<?php echo esc_attr( sprintf( __( 'Permalink to %s', 'foundation' ), the_title_attribute( 'echo=0' ) ) ); ?>" rel="bookmark"><?php the_title(); ?></a></h2>
			<h6><?php _e('Article By', 'foundation' );?> <?php the_author_link(); ?> published: <?php the_time(get_option('date_format')); ?></h6>
		</hgroup>
		<?php include ('lib/social-share.php'); ?>
		</div>
	</header>
	<?php the_content(); ?>
	<?php get_template_part('author-box'); ?>
	<?php comments_template(); ?>
</article>
		
	<?php endwhile; ?>
	<?php endif; ?>



    </div>
    </div>
    <!-- End Main Content -->

<?php get_sidebar(); ?>
<?php get_footer(); ?>