<?php
/**
 * Header
 *
 * Setup the header for our theme
 *
 * @package WordPress
 * @subpackage Foundation, for WordPress
 * @since Foundation, for WordPress 1.0
 */
?>

<!DOCTYPE html>

<!-- paulirish.com/2008/conditional-stylesheets-vs-css-hacks-answer-neither/ -->
<!--[if lt IE 7]> <html class="no-js lt-ie9 lt-ie8 lt-ie7" <?php language_attributes(); ?>> <![endif]-->
<!--[if IE 7]>    <html class="no-js lt-ie9 lt-ie8" <?php language_attributes(); ?>> <![endif]-->
<!--[if IE 8]>    <html class="no-js lt-ie9" <?php language_attributes(); ?>> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js" <?php language_attributes(); ?>> <!--<![endif]-->
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>" />

<link rel="profile" href="http://gmpg.org/xfn/11" />
<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>" />

<!-- Set the viewport width to device width for mobile -->
<meta name="viewport" content="width=device-width" />

<title><?php wp_title(); ?></title>

<?php wp_head(); ?>

</head>

<body <?php body_class(); ?>>

<div class="row" id="wrap">
	<?php get_sidebar(); 
	//three columns
	?>
	<div class="nine columns" id="main">
		
		<header class="row">
			<div class="twelve columns panel radius" id="header-bg">
				<hgroup class="site-title four columns">
					<h1><a href="<?php echo esc_url( home_url( '/' ) ); ?>" title="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></h1>
					<h3 class="subheader"><a href="<?php the_permalink(); ?>" title="<?php echo esc_attr( sprintf( __( 'Permalink to %s', 'foundation' ), the_title_attribute( 'echo=0' ) ) ); ?>" rel="bookmark"><?php the_title(); ?></a></h3>
				</hgroup>
			
				<div class="eight colums" role="nav">
					nav
				</div>
			</div>
		</header>
			
		<!-- Main Content -->
		<div class="row">
			<div class="twelve columns" role="content">

				<?php if ( have_posts() ) : ?>

					<?php while ( have_posts() ) : the_post(); ?>
						<?php get_template_part( 'content', get_post_format() ); ?>
					<?php endwhile; ?>

				<?php else : ?>

					<h2><?php _e('No posts.', 'foundation' ); ?></h2>
					<p class="lead"><?php _e('Sorry about this, I couldn\'t seem to find what you were looking for.', 'foundation' ); ?></p>
			
				<?php endif; ?>

				<?php foundation_pagination(); ?>

			</div>
			<!-- End Main Content -->
		</div>
	<!-- End Page -->

	<!-- Footer -->
		<footer class="row">
			<div class="twelve columns panel radius" id="footer-bg">
				<div class="row">
			
					<div class="four columns panel callout radius">
						<a href="https://github.com/Shelob9/Foundation/tree/thesis13" class="fc-webicon git"></a>
						<br />
						<p>Fork!</p>
					</div>
				
					<div class="four columns panel callout radius">
						<h6>Description of site</h6>
						<h7>Copyright 2013 Josh Pollock. Some rights reserved.</h7>
					</div>
			
					<div class="four columns panel callout radius">
						<div class="row">
							<div class="four columns">
								<a href="#" class="fc-webicon #"></a>
							</div>
						
							<div class="four columns">
								<a href="#" class="fc-webicon facebook"></a>
							</div>
							<div class="four columns">
								<a href="#" class="fc-webicon googleplus"></a>
							</div>
							<div class="four columns">
								<a href="#" class="fc-webicon email"></a>
							</div>
						</div>
						<div class="row">
							<div class="four columns centered">
								<p>Connect!</p>
							</div>
						</div>
					</div>
				</div>
				
				<div class="row">
					<div class="eight columns centered panel callout radius">
						<P>Content licensed under ? Creative Commons License. Site powered by WordPress. WordPress and this theme licensed under GPLv?. Theme based on Foundation Framework, which is licensed under the MIT License, and is based on a starter theme by Drewmoyo.
						</p>
					</div>
				</div>
			</div>

		</footer>
	<!-- End Footer -->
	</div> <!--id="main"-->
	
	
	<?php wp_footer(); ?>
	
</div><!-- id="wrap"-->

</body>
</html>

