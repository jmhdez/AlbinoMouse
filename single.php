<?php
/**
 * The Template for displaying all single posts.
 *
 * @package AlbinoMouse
 * @since AlbinoMouse 1.0
 */

get_header(); ?>

<div id="content" class="site-single-post" role="main">

	<?php while ( have_posts() ) : the_post(); ?>

		<?php get_template_part( 'content', 'single' ); ?>	

		<?php
		// If comments are open or we have at least one comment, load up the comment template
		if ( comments_open() || '0' != get_comments_number() )
			comments_template( '', true );
		?>
		
	<?php endwhile; // end of the loop. ?>

</div><!-- #content .site-single-post -->

<?php 
$options = get_option('albinomouse');
if( $options['sidebar-layout'] == '2c-r' ) {
	get_sidebar(); 
} ?>

<?php get_footer(); ?>