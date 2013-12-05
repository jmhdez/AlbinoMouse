<?php
/**
 * The template for displaying Archive pages.
 *
 * @package AlbinoMouse
 * @since AlbinoMouse 1.0
 */

get_header(); ?>

<?php $options = get_option( 'albinomouse' ); ?>

<div id="content" class="site-archive" role="main">

	<?php if ( have_posts() ) : ?>

		<header class="page-header">
			<?php
				if ( is_category() ) {
					printf( __( '<h1 class="page-title archive-header symbol folder-icon">Category Archives: %s', 'albinomouse' ), '<span>' . single_cat_title( '', false ) . '</span></h1>' );

				} elseif ( is_tag() ) {
					printf( __( '<h1 class="page-title archive-header tag-icon">Tag Archives: %s', 'albinomouse' ), '<span>' . single_tag_title( '', false ) . '</span></h1>' );

				} elseif ( is_author() ) {
					/* Queue the first post, that way we know
					 * what author we're dealing with (if that is the case).
					*/
					the_post();
					printf( __( '<h1 class="archive-header page-title symbol user-icon">Author Archives: %s', 'albinomouse' ), '<span class="vcard"><a class="url fn n" href="' . get_author_posts_url( get_the_author_meta( "ID" ) ) . '" title="' . esc_attr( get_the_author() ) . '" rel="me">' . get_the_author() . '</a></span></h1>' );
					/* Since we called the_post() above, we need to
					 * rewind the loop back to the beginning that way
					 * we can run the loop properly, in full.
					 */
					rewind_posts();

				} elseif ( is_day() ) {
					printf( __( '<h1 class="page-title archive-header calendar-icon">Daily Archives: %s', 'albinomouse' ), '<span>' . get_the_date() . '</span></h1>' );

				} elseif ( is_month() ) {
					printf( __( '<h1 class="page-title archive-header symbol calendar-icon">Monthly Archives: %s', 'albinomouse' ), '<span>' . get_the_date( 'F Y' ) . '</span></h1>' );

				} elseif ( is_year() ) {
					printf( __( '<h1 class="page-title archive-header symbol calendar-icon">Yearly Archives: %s', 'albinomouse' ), '<span>' . get_the_date( 'Y' ) . '</span></h1>' );

				} else {
					_e( '<h1 class="page-title archive-header symbol archive-icon">Archives</h1>', 'albinomouse' );

				}

				
				if ( is_category() ) {
					// show an optional category description
					$category_description = category_description();
					if ( ! empty( $category_description ) )
						echo apply_filters( 'category_archive_meta', '<div class="taxonomy-description">' . $category_description . '</div>' );

				} elseif ( is_tag() ) {
					// show an optional tag description
					$tag_description = tag_description();
					if ( ! empty( $tag_description ) )
						echo apply_filters( 'tag_archive_meta', '<div class="taxonomy-description">' . $tag_description . '</div>' );
				}
			?>
		</header>

		<?php rewind_posts(); ?>

		<?php /* Start the Loop */ ?>
		<?php while ( have_posts() ) : the_post(); ?>

			<?php
				/* Include the Post-Format-specific template for the content.
				 * If you want to overload this in a child theme then include a file
				 * called content-___.php (where ___ is the Post Format name) and that will be used instead.
				 */
				get_template_part( 'content', get_post_format() );
			?>

		<?php endwhile; ?>

		<?php albinomouse_content_nav( 'nav-below' ); ?>

	<?php else : ?>

		<?php get_template_part( 'no-results', 'archive' ); ?>

	<?php endif; ?>

</div><!-- #content .site-archive -->

<?php if( $options['sidebar-layout'] == '2c-r' ) {
	get_sidebar(); 
} ?>

<?php get_footer(); ?>