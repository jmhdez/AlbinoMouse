<?php
/**
 * Template Name: Page Full Width
 * Description: A full width template without the sidebar.
 *
 * @package AlbinoMouse
 * @since AlbinoMouse 1.0
 */

get_header(); ?>

<div id="content" class="site-page-full-width" role="main">

	<?php while ( have_posts() ) : the_post(); ?>

		<?php get_template_part( 'content', 'page' ); ?>

		<?php comments_template( '', true ); ?>

	<?php endwhile; // end of the loop. ?>

</div><!-- #content .site-page-full-width -->

<?php get_footer(); ?>