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
<div class="row">
	<div class="twelve columns">
		<h2>About Nature Scholar</h2>
		<p>Nature Scholar is a jumping off point for students of environmental studies, environmental science, and life science who are seeking to find their way through interdisciplinary research.</p>
		<?php wp_list_authors(); ?> 
	</div>
</div>		



    </div>
    </div>
    <!-- End Main Content -->

<?php get_sidebar(); ?>
<?php get_footer(); ?>