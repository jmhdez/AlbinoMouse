<?php
/**
 * The main template file.
 *
 * @package AlbinoMouse
 * @since AlbinoMouse 1.0
 */

get_header(); ?>

<div id="content" class="site-content" role="main">

	<?php if ( have_posts() ) : ?>

		<?php /* Start the Loop */ ?>
		<?php while ( have_posts() ) : the_post(); ?>

			<?php
				get_template_part( 'content', get_post_format() );
			?>

		<?php endwhile; ?>

		<?php albinomouse_content_nav( 'nav-below' ); ?>

	<?php elseif ( current_user_can( 'edit_posts' ) ) : ?>

		<?php get_template_part( 'no-results', 'index' ); ?>

	<?php endif; ?>

</div><!-- #content .site-content -->
				
<?php 
$options = get_option('albinomouse');
if( $options['sidebar-layout'] == '2c-r' ) {
	get_sidebar(); 
} ?>

<?php get_footer(); ?>