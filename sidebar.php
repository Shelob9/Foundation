<?php
/**
 * Sidebar
 *
 * Content for our sidebar, provides prompt for logged in users to create widgets
 *
 * @package WordPress
 * @subpackage Foundation, for WordPress
 * @since Foundation, for WordPress 1.0
 */
?>

<!-- Sidebar -->
<aside class="three columns pull-nine">

<div class="row panel radius centered" style="margin-top:5px; margin-bottom:5px; margin-left:5px;">


	<div class="row" id="sidebar-social">
		<div class="twelve columns centered">
			<a href="http://facebook.com/NatureScholar" class="fc-webicon facebook"></a>
			<a href="http://twitter.com/NatureScholar" class="fc-webicon twitter"></a>
			<a href="https://plus.google.com/u/0/106312220776549430635" class="fc-webicon googleplus"></a>
			<a href="<?php bloginfo('rss2_url'); ?>" class="fc-webicon rss"></a>
		</div>
	</div>
	
	<div class="row" id="twitters-sidebar">
		<div class="twelve columns centered">
			<a href="https://twitter.com/NatureScholar" class="twitter-follow-button" data-show-count="false">Follow @TWITTERNAME</a>
			<script>!function(d,s,id){var js,fjs=d.getElementsByTagName(s)[0];if(!d.getElementById(id)){js=d.createElement(s);js.id=id;js.src="//platform.twitter.com/widgets.js";fjs.parentNode.insertBefore(js,fjs);}}(document,"script","twitter-wjs");</script>
		</div>
	</div>
	
	<div class="row" id="fblike-sidebar">
		<div class="twelve columns centered">
			<div class="fb-like" layout="standard "data-href="http://NatureScholar.com" data-send="false" data-width="225" data-show-faces="false" data-font="arial"></div>
		</div>
		<div class="facebook_hide_count"></div>
	</div>
	
	<div class="row" id="adsense" style="margin-top:5px; margin-bottom:5px; margin-left:5px;">
		<div class="twelve columns centered">
			<?php /* adsense_ad(); */ ?> 
		</div>
   	</div>

	

	<div class="row" id="leftbar" style="margin-top:5px; margin-bottom:5px; margin-left:5px;">
		<div class="twelve columns centered">
			<?php if ( dynamic_sidebar('Sidebar Right') ) : elseif( current_user_can( 'edit_theme_options' ) ) : ?>

			<h5><?php _e( 'No widgets found.', 'foundaton' ); ?></h5>
			<p><?php printf( __( 'It seems you don\'t have any widgets in your sidebar! Would you like to %s now?', 'foundation' ), '<a href=" '. get_admin_url( '', 'widgets.php' ) .' ">populate your sidebar</a>' ); ?></p>

			<?php endif; ?>
		</div>
	</div>
	
	
</div>

</aside>
<!-- End Sidebar -->