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
		<h2>Últimos posts <small>&nbsp;<a href="TODO">Ver todos</a></small></h2>

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
		<div class="intro-tags">
			<h2>Temas</h2>
			<div class="tag-cloud">
				<?php wp_tag_cloud('smallest=14&largest=24&unit=px&number=80&separator=  '); ?>
			</div>		
		</div>
	</section>

</div><!-- #content .site-archive -->

<?php if( $options['sidebar-layout'] == '2c-r' ) {
	get_sidebar(); 
} ?>

<?php get_footer(); ?>