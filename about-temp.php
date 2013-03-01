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
		<div id="authorlist"><ul><?php contributors(); ?></ul></div>
	</div>
</div>		



    </div>
    </div>
    <!-- End Main Content -->

<?php get_sidebar(); ?>
<?php get_footer(); ?>