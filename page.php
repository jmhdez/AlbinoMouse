<?php
/**
 * The template for displaying all pages.
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site will use a
 * different template.
 *
 * @package AlbinoMouse
 * @since AlbinoMouse 1.0
 */

get_header(); ?>

<div id="content" class="site-page intro" role="main">

	<?php while ( have_posts() ) : the_post(); ?>

		<?php get_template_part( 'content', 'page' ); ?>

		<?php comments_template( '', true ); ?>

	<?php endwhile; // end of the loop. ?>

</div><!-- #content .site-page -->

<?php 
$options = get_option('albinomouse');
if( $options['sidebar-layout'] == '2c-r' ) {
	get_sidebar(); 
} ?>
	
<?php get_footer(); ?>