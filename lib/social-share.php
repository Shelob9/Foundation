<div class="row">
			<div class="two columns">
				<?php $username = get_the_author_meta('twitter'); ?>
				<a class="twitter-follow-button" data-show-count="false" href="http://twitter.com/<?php echo $username; ?>">Follow @<?php echo $username; ?></a>
				<script>!function(d,s,id){var js,fjs=d.getElementsByTagName(s)[0];if(!d.getElementById(id)){js=d.createElement(s);js.id=id;js.src="//platform.twitter.com/widgets.js";fjs.parentNode.insertBefore(js,fjs);}}(document,"script","twitter-wjs");</script>
			</div>
	
			<div class="nine columns offset-by-one">
				<?php lacands_wp_filter_content_widget(); ?>
			</div>
</div>