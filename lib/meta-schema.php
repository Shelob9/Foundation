<meta itemprop="author" content="<?php 
					$terms = wp_get_post_terms($post->ID, 'author');
					$count = count($terms);
					if ( $count > 0 ) {
    				foreach ( $terms as $term ) {
       				echo $term->name . " ";
					}}?>">
<meta itemprop="name" content"<?php the_title() ?>: <?php
					$terms = wp_get_post_terms($post->ID, 'subtitles');
					$count = count($terms);
					if ( $count > 0 ) {
    				foreach ( $terms as $term ) {
       				echo $term->name . " ";
					}}
					?>">
<meta itemprop="datePublished" content="<?php
					$terms = wp_get_post_terms($post->ID, 'years');
					$count = count($terms);
					if ( $count > 0 ) {
    				foreach ( $terms as $term ) {
       				echo $term->name . " ";
					}}
					?>">