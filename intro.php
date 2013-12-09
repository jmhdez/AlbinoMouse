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

	<div class="three_fourth_col">

		<h2>Todos mis artículos</h2>

		<ul id="intro-posts">
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
	</div>
	<div class="one_forth_column">

		<h2>Temas que he tratado</h2>

		<ul id="intro-tags">
			<?php 
				$tags = get_tags();
				foreach ($tags as $tag) {
					echo '<li><a href="' . get_tag_link($tag->term_id) . '" title="Posts sobre ' . $tag->name . '">' . $tag->name . '</a></li>' ;
				}
			?>
		</ul>
	</div>

</div><!-- #content .site-archive -->

<?php if( $options['sidebar-layout'] == '2c-r' ) {
	get_sidebar(); 
} ?>

<?php get_footer(); ?>