<header>
		<div class="row">
			<div class="three columns">
				<div class="row">
					<div class="twelve columns">
					<?php if ( has_post_thumbnail()) : ?>
					<a href="<?php the_permalink(); ?>" class="th" title="<?php the_title_attribute(); ?>" ><?php the_post_thumbnail(); ?></a>
					<?php endif; ?>
					</div>
				</div>
				
				<div class="row">
					<div class="twelve columns">
					<a class="success button radius" href="http://www.amazon.com/exec/obidos/ASIN/<?php  $meta = get_post_meta( get_the_ID(), 'rw_pamz', true ); echo $meta; ?>/<?php amazon_track(); ?>/" target="_blank">Buy Book</a>
						
					</div>
				</div>
				

			
			</div>
			
			
			<div class="nine columns">
				<div class="row">
					<hgroup>
						<span itemprop="name">
								<h2><a href="<?php the_permalink(); ?>" title="<?php echo esc_attr( sprintf( __( 'Permalink to %s', 'foundation' ), the_title_attribute( 'echo=0' ) ) ); ?>" rel="bookmark"><?php the_title(); ?></a></h2>
								<h5><em><?php  $meta = get_post_meta( get_the_ID(), 'rw_subt', true ); echo $meta; ?></em></h5>
						</span>
						
							<h4><?php the_terms( $post->ID, 'author', 'By:&nbsp;<span itemprop="author">', '</span>,<span itemprop="author">', '</span>.' ); ?></h4>
						
							<?php /*<h5><?php the_terms( $post->ID, 'fields', 'Fields:&nbsp;', '&nbsp;,&nbsp;', '' ); ?></h5> */ ?>
							<h6><?php _e('Article By', 'foundation' );?> <?php the_author_link(); ?> Posted: <?php the_time(get_option('date_format')); ?></h6>
					</hgroup>
				</div>
			
					<div class="row">
						<div class="four columns" id="tweet-it">
							<a href="https://twitter.com/share" class="twitter-share-button" data-via="naturescholar data-text="<?php the_title(); ?>" data-url="<?php the_permalink(); ?>">Tweet</a>
							<script>!function(d,s,id){var js,fjs=d.getElementsByTagName(s)[0];
							if(!d.getElementById(id)){js=d.createElement(s);js.id=id;js.src="//platform.twitter.com/widgets.js";
							fjs.parentNode.insertBefore(js,fjs);}}(document,"script","twitter-wjs");</script>
						</div>
						<div class="four columns">
							<div class="g-plusone" data-size="medium" data-annotation="none">
							</div>
						</div>
						
						<div class="four columns">	
							<a href="http://www.reddit.com/submit" onclick="window.location = 'http://www.reddit.com/submit?url=' + encodeURIComponent(window.location); return false"> <img src="http://www.reddit.com/static/spreddit7.gif" alt="submit to reddit" border="0" /> </a>
						</div>
					</div>
					
					<div class="row">
					
						<div class="three columns">
							<?php $username = get_the_author_meta('twitter'); ?>
							<a class="twitter-follow-button" data-show-count="false" href="http://twitter.com/<?php echo $username; ?>">Follow @<?php echo $username; ?></a>
							<script>!function(d,s,id){var js,fjs=d.getElementsByTagName(s)[0];if(!d.getElementById(id)){js=d.createElement(s);js.id=id;js.src="//platform.twitter.com/widgets.js";fjs.parentNode.insertBefore(js,fjs);}}(document,"script","twitter-wjs");</script>
						</div>
						<div class="six columns offset-by-three">
							<div class="fb-like" style="overflow:hidden; width: 45px !important;" data-href="http://www.facebook.com/naturescholar" href="<?php echo get_permalink($post->ID); ?>" data-send="false" data-layout="button-count" data-width="450" data-show-faces="false" data-font="arial">
							</div>
							<div class="facebook_hide_count"></div>

						</div>
						
						
						
						
					</div>
					
			</div>
</header>