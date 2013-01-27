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
 <?php include ('lib/open-main.php'); ?>
	
		
		<div class="row" id="inner-banner">
			<div class="six columns">
				<a href="<?php echo esc_url( home_url( '/' ) ); ?>" title="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>" rel="home">
			
				<img src="<?php bloginfo('template_directory'); ?>/lib/img/header-banner.png" title="NatureScholar.com Banner" alt="Nature Scholar Logo" width="400" height="195" />
			
				</a>
			</div>
			
			<div class="six columns">
				<p>Nature Scholar is a jumping off point for students of environmental studies, environmental science, and life science who are seeking to find their way through interdisciplinary research.</p>
			</div>
		</div>
	
		
		<div class="row panel callout radius" id="books" style="margin:5px 5px 5px 5px;">
			<div class="row">
				<div class="seven columns">
					<h4>Most Recent Book Reviews:</h4>
				</div>
				<div class="three columns panel offset-by-two alert-box alert">
					<h6><a href="<?php bloginfo('url'); ?>/books" title="<?php bloginfo('name'); ?>| All Books">
					All books</a></h6>
				</div>
			</div>
			<div class="row">
				
			<ul class="block-grid four-up mobile-two-up">
					<?php query_posts('post_type=books&&posts_per_page=8'); ?>				
					<?php if ( have_posts() ) : ?>
					<?php while ( have_posts() ) : the_post(); ?>		
			
					<li>
						<div class="row">
							<div class="twelve columns centered">
								<a href="<?php the_permalink() ?>">
								<?php the_post_thumbnail('thumbnail') ?>
							</div>
						</div>
						<div class="row">
							<div class="twelve columns centered hide-for-small">
								<?php the_title(); ?></a>
							</div>
						</div>
					</li>
					
			
			<?php endwhile; ?>

		<?php else : ?>

			<h2><?php _e('No posts.', 'foundation' ); ?></h2>
			<p class="lead"><?php _e('Sorry about this, I couldn\'t seem to find what you were looking for.', 'foundation' ); ?></p>
			
		<?php endif; ?>
			</ul>	
			</div>
			<div class="row">
				
				
			</div>
		</div>
	</div>	
		
 
</div>
<!-- End Main Content -->

<?php get_sidebar(); ?>
<?php get_footer(); ?>