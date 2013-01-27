<?php
/**
 * Single
 *
 * Loop container for single post content
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

<div itemscope itemtype="http://schema.org/Book">			
<article>

	<?php get_template_part( 'books', 'header' ); ?>

	
	
	<?php the_content(); ?>
<?php /*include ('lib/meta-schema.php'); */ ?>
<footer>

		<p><?php wp_link_pages(); ?></p>
		<?php get_template_part( 'tags' ); ?>
	<div class="row">
		<div class="four columns centered">
		</div>
	</div>
		<?php get_template_part('author-box'); ?>
		<?php comments_template(); ?>

</footer>

</article>
</div><!--/schema itemscope itemtype="http://schema.org/Book">-->
<hr />			
			
			
			
			
<!-- End The Loop -->			
<?php endwhile; ?>			
<?php endif; ?>
	</div>
    </div>
    <!-- End Main Content -->

<?php get_sidebar(); ?>
<?php get_footer(); ?>