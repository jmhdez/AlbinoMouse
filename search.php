<?php
/**
 * The template for displaying Search Results pages.
 *
 * @package AlbinoMouse
 * @since AlbinoMouse 1.0
 */

get_header(); ?>

<div id="content" class="site-search" role="main">

	<?php if ( have_posts() ) : ?>

		<header class="page-header">
			<h6 class="page-title search"><?php printf( __( 'Search Results for: %s', 'albinomouse' ), '<span>' . get_search_query() . '</span>' ); ?></h6>
		</header>

		<?php /* Start the Loop */ ?>
		<?php while ( have_posts() ) : the_post(); ?>

			<?php get_template_part( 'content', 'search' ); ?>

		<?php endwhile; ?>

		<?php albinomouse_content_nav( 'nav-below' ); ?>

	<?php else : ?>

		<?php get_template_part( 'no-results', 'search' ); ?>

	<?php endif; ?>

</div><!-- #content .site-search -->

<?php 
$options = get_option('albinomouse');
if( $options['sidebar-layout'] == '2c-r' ) {
	get_sidebar(); 
} ?>

<?php get_footer(); ?>