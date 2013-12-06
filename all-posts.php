<?php
/**
 * Template Name: All posts
 * @package AlbinoMouse
 */


get_header(); ?>

<?php $options = get_option( 'albinomouse' ); ?>

<div id="content" class="site-archive" role="main">

	<ul id="archives-posts">
				<?php
					global $post;
					$args = array( 'orderby' => 'post_date', 'order' => 'DESC', 'numberposts' => '10000' );
					$myposts = get_posts( $args );

					foreach( $myposts as $post ) : setup_postdata($post); ?>
					<li>
          	<p><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a><br/><small><?php the_date(); ?></small></p>
        	</li>
					<?php endforeach; ?>
	</ul>

</div><!-- #content .site-archive -->

<?php if( $options['sidebar-layout'] == '2c-r' ) {
	get_sidebar(); 
} ?>

<?php get_footer(); ?>