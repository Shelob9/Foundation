<?php
/**
 * BIOLOGY Index
 *
 *
 * @package WordPress
 * @subpackage Foundation, for WordPress
 * @since Foundation, for WordPress 1.0
 */

get_header(); ?>

    <!-- Main Content -->

 
 
<?php include ('lib/open-main.php'); ?>
<div class="row">

	<div class="twelve columns panel callout radius">
		<div class="row">
			<div class="three columns centered" style="margin-bottom:5px;">
				
			</div>
		</div>
		<div class="row">
			<div class="twelve columns centered" style="line-height:125%;">
				<span class="radius label secondary">
					<strong>Subfields:</strong>
				</span>&nbsp;&nbsp;
				<span class="radius label success">
					<a href=" " title="Evolutionary Biology">Evolutionary Biology</a>
				</span>&nbsp;&nbsp;
				<span class="radius label success">
					<a href=" " title="Microbiology">Microbiology</a>
				</span>&nbsp;&nbsp;
				<span class="radius label success">
					<a href=" " title="Genetics">Genetics</a>
				</span>&nbsp;&nbsp;
				<span class="radius label success">
					<a href="/sociobiology/" title="Sociobiology">Sociobiology</a>
				</span>
			</div>
		</div>
	</div>
</div>
<?php if ( have_posts() ) : ?>
 			 
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