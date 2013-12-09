<?php
/**
 * Template Name: Intro Page
 * @package AlbinoMouse
 */


get_header(); ?>

<?php $options = get_option( 'albinomouse' ); ?>

<div id="content" class="intro" role="main">

	<div class="intro-content">

		<?php if (have_posts()) {
			while (have_posts()) {
				the_post();
				the_content();
			}
		} ?>
		
	</div>

	<div class="three_fourth_col intro-posts">

		<h2>Histórico de Posts</h2>

		<ul>

			<?php
				global $post;
				$args = array('posts_per_page' => '1000');
				$myposts = get_posts( $args );

				foreach( $myposts as $p ): 
					$post = $p;
					setup_postdata($post); 
			?>
				<li>
        	<a href="<?php the_permalink(); ?>"><?php the_title(); ?></a> <small><?php the_date(); ?></small>
      	</li>
			<?php endforeach; ?>
		</ul>
		
	</div>

	<div class="one_forth_column intro-tags">

		<h2>Temas</h2>

		<div class="tag-cloud">
			<?php if ( function_exists('wp_tag_cloud') ) : wp_tag_cloud('smallest=12&largest=20'); endif; ?>
		</div>

	</div>

</div><!-- #content .site-archive -->

<?php if( $options['sidebar-layout'] == '2c-r' ) {
	get_sidebar(); 
} ?>

<?php get_footer(); ?>