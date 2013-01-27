<div class="nine columns push-three" role="content">
<div class="row panel radius" style="margin:5px 5px 5px 5px;">


<?php 
//list terms in a given taxonomy using wp_list_categories (also useful as a widget if using a PHP Code plugin)

$taxonomy     = 'fields';
$orderby      = 'name'; 
$show_count   = 0;      // 1 for yes, 0 for no
$pad_counts   = 0;      // 1 for yes, 0 for no
$hierarchical = 1;      // 1 for yes, 0 for no
$title        = '';

$args = array(
  'taxonomy'     => $taxonomy,
  'orderby'      => $orderby,
  'show_count'   => $show_count,
  'pad_counts'   => $pad_counts,
  'hierarchical' => $hierarchical,
  'title_li'     => $title
);
?>
<ul class="nav-bar">
  <li><a href="/books/" title="All Books">All Books</a></li>
  <li class="has-flyout">
    <a href="/fields/" title="All Fields">Fields</a>
    
	<ul class="flyout">
	<?php wp_list_categories( $args ); ?>
	</ul>
		<?php 
		//list terms in a given taxonomy using wp_list_categories (also useful as a widget if using a PHP Code plugin)

		$taxonomy     = 'author';
		$orderby      = 'name'; 
		$show_count   = 0;      // 1 for yes, 0 for no
		$pad_counts   = 0;      // 1 for yes, 0 for no
		$hierarchical = 1;      // 1 for yes, 0 for no
		$title        = '';
		$number      = 10;

		$args = array(
		  'taxonomy'     => $taxonomy,
		  'orderby'      => $orderby,
		  'show_count'   => $show_count,
		  'pad_counts'   => $pad_counts,
		  'hierarchical' => $hierarchical,
		  'title_li'     => $title,
		  'number'		=> $number
		);
		?>
			<li class="has-flyout">
				<a href="/authors/" title="All Authors">Authors</a>
    
		<ul class="flyout">
		<?php wp_list_categories( $args ); ?>
		<li><a href="/gus/authors/">Click Here For All Authors</a></li>
		</ul>
	<li><a href="<?php get_bloginfo('url') ?>/about/" title="about">About</a></li>
	


</li>


</ul>

  




<?php
//Is used in:
//home.php
//index.php
//single-books.php
//archive-boks.php
//single.php
//page.php

?>