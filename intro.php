<?php
/**
 * Template Name: Intro Page
 * @package AlbinoMouse
 */


get_header(); ?>

<?php $options = get_option( 'albinomouse' ); ?>

<div id="content" class="intro" role="main">

	<section class="intro-content">

		<?php if (have_posts()) {
			while (have_posts()) {
				the_post();
				the_content();
			}
		} ?>
		
	</section>

	<?php
		/* Load all posts */

		global $post;
		$args = array('posts_per_page' => '1000');
		$myposts = get_posts($args);
	?>

	<section class="intro-last-post">
		<h2>Últimas entradas <small>&nbsp;&nbsp;&nbsp;<a href="TODO">Ver todas<i class="icon-chevron-right"></i></a></small></h2>

		<div class="one_half_col">
			<?php $post = $myposts[0]; setup_postdata($post); ?>
			<h3><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a><br/><small><?php the_date(); ?></small></h3>
			<?php the_excerpt(); ?>
		</div>
		<div class="one_half_col last_col">
			<?php $post = $myposts[1]; setup_postdata($post); ?>
			<h3><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a><br/><small><?php the_date(); ?></small></h3>
			<?php the_excerpt(); ?>
		</div>
	</section>

	<section class="intro-archive">

		<div class="three_fourth_col intro-posts">
			<h2>Histórico</h2>
			<ul>
				<?php	foreach($myposts as $post): 
						setup_postdata($post); ?>
					<li>
		      	<a href="<?php the_permalink(); ?>"><?php the_title(); ?></a> <small><?php the_date(); ?></small>
		    	</li>
				<?php endforeach; ?>
			</ul>
		</div>

		<div class="one_fourth_col last_col intro-tags">
			<h2>Temas</h2>
			<div class="tag-cloud">
				<?php if ( function_exists('wp_tag_cloud') ) : wp_tag_cloud('smallest=12&largest=20'); endif; ?>
			</div>
		</div>

	</section>

</div><!-- #content .site-archive -->

<?php if( $options['sidebar-layout'] == '2c-r' ) {
	get_sidebar(); 
} ?>

<?php get_footer(); ?>