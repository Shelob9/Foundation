<?php
/**
 * Index
 *
 * Standard loop for the front-page
 *
 * @package WordPress
 * @subpackage Foundation, for WordPress
 * @since Foundation, for WordPress 1.0
 */

get_header(); ?>

    <!-- Main Content -->

 <?php if ( have_posts() ) : ?>
 
<?php include ('lib/open-main.php'); ?>
	


 			 
			<?php while ( have_posts() ) : the_post(); ?>
			
			<div itemscope itemtype="http://schema.org/Book">
			<article style="margin-left:5px;">
				<?php get_template_part( 'books', 'header' ); ?>
				<?php get_template_part( 'excerpt', 'footer' ); ?>
			</article>
			</div><!--/schema-->
			<hr>
			<?php endwhile; ?>

		<?php else : ?>

			<h2><?php _e('No posts.', 'foundation' ); ?></h2>
			<p class="lead"><?php _e('Sorry about this, I couldn\'t seem to find what you were looking for.', 'foundation' ); ?></p>
			
		<?php endif; ?>

		<?php foundation_pagination(); ?>
 
</div>
</div>
    
    <!-- End Main Content -->

<?php get_sidebar(); ?>
<?php get_footer(); ?>