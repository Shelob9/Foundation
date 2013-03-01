<?php
/*
Template Name: About Page Template
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
			 <h2>About Nature Scholar</h2>
		</hgroup>
	</header>
	<div class="row">
		<div class="twelve columns">
			<?php the_content(); ?>
		</div>
	</div>
<?php endwhile; ?>
<?php endif; ?>
		
<h2>Contributors</h2>
	<ul class="block-grid two-up"><?php contributors(); ?></ul>
</article>
		



    </div>
    </div>
    <!-- End Main Content -->

<?php get_sidebar(); ?>
<?php get_footer(); ?>