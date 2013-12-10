<?php
/**
 * Template Name: All Posts Page
 * @package AlbinoMouse
 */


get_header(); ?>

<?php $options = get_option( 'albinomouse' ); ?>

<div id="content" class="intro" role="main">

	<?php
		/* Load all posts */

		global $post;
		$args = array('posts_per_page' => '1000');
		$myposts = get_posts($args);
	?>

	<section>
		<h2>Todos los posts</h2>
		<ul class="post-list">
			<?php	foreach($myposts as $post): 
					setup_postdata($post); ?>
				<li>
	      	<a href="<?php the_permalink(); ?>"><?php the_title(); ?></a> <small><?php the_date(); ?></small>
	    	</li>
			<?php endforeach; ?>
		</ul>
	</section>

</div><!-- #content .site-archive -->

<?php if( $options['sidebar-layout'] == '2c-r' ) {
	get_sidebar(); 
} ?>

<?php get_footer(); ?>