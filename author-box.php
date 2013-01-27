<?php
/**
 * Author Box
 *
 * Displays author box with author description and thumbnail on single posts
 *
 * @package WordPress
 * @subpackage Foundation, for WordPress
 * @since Foundation, for WordPress 1.0
 */
?>

<section class="row">
	<div class="twelve columns">

		<div class="panel author-box">
			<a class="th" href="<?php get_the_author_meta('url'); ?>"><?php echo get_avatar( get_the_author_meta('user_email'),'55' ); ?></a>
			<h5><?php _e('About', 'foundation' ); ?> <?php the_author_link(); ?>
			<?php $google_profile = get_the_author_meta( 'google_profile' );
			if ( $google_profile ) {
			echo '<a class="fc-webicon googleplus small" href="' . esc_url($google_profile) . '" rel="me"></a>';
			} ?>
			
			<?php $username = get_the_author_meta('tumblr');
			if ( $username != null ) {
			$a1 = "<a class=\"fc-webicon tumblr small\" href=\"http://";
			$a2 = ".tumblr.com\"></a>";
			echo $a1.$username.$a2;
			} ?>
			
			<?php $username = get_the_author_meta('twitter');
			$a1 = "<a class=\"fc-webicon twitter small\" href=\"http://twitter.com/";
			$a2 = "\"></a>";
			if ( $username != null ) {
			echo $a1.$username.$a2;
			} ?>
			</h5>
			
		
			
			<p>
				<?php echo get_the_author_meta('description'); ?>
			</p>
		</div>
		
	</div>
</section>