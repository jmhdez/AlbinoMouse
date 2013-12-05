<?php
/**
 * Custom template tags for this theme.
 *
 * Eventually, some of the functionality here could be replaced by core features
 *
 * @package AlbinoMouse
 * @since AlbinoMouse 1.0
 */

if ( ! function_exists( 'albinomouse_content_nav' ) ):
/**
 * Display navigation to next/previous pages when applicable
 *
 * @since AlbinoMouse 1.0
 */
function albinomouse_content_nav( $nav_id ) {
	global $wp_query;

	$nav_class = 'site-navigation paging-navigation';
	if ( is_single() )
		$nav_class = 'site-navigation post-navigation';

	?>
	<nav role="navigation" id="<?php echo $nav_id; ?>" class="<?php echo $nav_class; ?>">
		<h1 class="assistive-text"><?php _e( 'Post navigation', 'albinomouse' ); ?></h1>

	<?php if ( is_single() ) : // navigation links for single posts ?>

		<?php previous_post_link( '<div class="nav-previous">%link</div>', '<i class="icon-arrow-left">' . _x( '', 'Previous post link', 'albinomouse' ) . '</i> %title' ); ?>
		<?php next_post_link( '<div class="nav-next">%link</div>', '%title <i class="icon-arrow-right">' . _x( '', 'Next post link', 'albinomouse' ) . '</i>' ); ?>

	<?php elseif ( $wp_query->max_num_pages > 1 && ( is_home() || is_archive() || is_search() ) ) : // navigation links for home, archive, and search pages ?>

		<?php if ( get_next_posts_link() ) : ?>
		<div class="nav-previous"><?php next_posts_link( __('<i class="icon-arrow-left"></i> Older posts', 'albinomouse' ) ); ?></div>
		<?php endif; ?>

		<?php if ( get_previous_posts_link() ) : ?>
		<div class="nav-next"><?php previous_posts_link( __( 'Newer posts <i class="icon-arrow-right"></i>', 'albinomouse' ) ); ?></div>
		<?php endif; ?>

	<?php endif; ?>

	</nav><!-- #<?php echo $nav_id; ?> -->
	<?php
}
endif; // albinomouse_content_nav

if ( ! function_exists( 'albinomouse_comment' ) ) :
/**
 * Template for comments and pingbacks.
 *
 * Used as a callback by wp_list_comments() for displaying the comments.
 *
 * @since AlbinoMouse 1.0
 */
function albinomouse_comment( $comment, $args, $depth ) {
	$GLOBALS['comment'] = $comment;
	switch ( $comment->comment_type ) :
		case 'pingback' :
		case 'trackback' :
	?>
	<li class="post pingback">
		<p><?php _e( 'Pingback:', 'albinomouse' ); ?> <?php comment_author_link(); ?><?php edit_comment_link( __( '<i class="icon-pencil"></i>Edit', 'albinomouse' ), ' ' ); ?></p>
	<?php
			break;
		default :
	?>
	<li <?php comment_class(); ?> id="li-comment-<?php comment_ID(); ?>">
		<article id="comment-<?php comment_ID(); ?>" class="comment">
			<div class="comment-head">
				<div class="comment-author vcard">
					<?php echo get_avatar( $comment, 60 ); ?>
					<?php printf( __( '%s <span class="says">says:</span>', 'albinomouse' ), sprintf( '<cite class="fn">%s</cite>', get_comment_author_link() ) ); ?>
				</div><!-- .comment-author .vcard -->
				<?php if ( $comment->comment_approved == '0' ) : ?>
					<em><?php _e( 'Your comment is awaiting moderation.', 'albinomouse' ); ?></em>
					<br />
				<?php endif; ?>

				<div class="comment-meta commentmetadata">
					<a href="<?php echo esc_url( get_comment_link( $comment->comment_ID ) ); ?>"><time pubdate datetime="<?php comment_time( 'c' ); ?>">
					<?php
						/* translators: 1: date, 2: time */
						printf( __( '%1$s at %2$s', 'albinomouse' ), get_comment_date(), get_comment_time() ); ?>
					</time></a>
					<?php edit_comment_link( __( '<i class="icon-pencil"></i>Edit', 'albinomouse' ), ' ' );
					?>
				</div><!-- .comment-meta .commentmetadata -->
			</div><!-- .comment-head -->

			<div class="comment-content"><?php comment_text(); ?></div>

			<div class="reply">
				<?php comment_reply_link( array_merge( $args, array( 'depth' => $depth, 'max_depth' => $args['max_depth'] ) ) ); ?>
			</div><!-- .reply -->
		</article><!-- #comment-## -->

	<?php
			break;
	endswitch;
}
endif; // ends check for albinomouse_comment()

/**
 * Returns true if a blog has more than 1 category
 * @since AlbinoMouse 1.0
 */
function albinomouse_categorized_blog() {
	if ( false === ( $all_the_cool_cats = get_transient( 'all_the_cool_cats' ) ) ) {
		// Create an array of all the categories that are attached to posts
		$all_the_cool_cats = get_categories( array(
			'hide_empty' => 1,
		) );

		// Count the number of categories that are attached to the posts
		$all_the_cool_cats = count( $all_the_cool_cats );

		set_transient( 'all_the_cool_cats', $all_the_cool_cats );
	}

	if ( '1' != $all_the_cool_cats ) {
		// This blog has more than 1 category so albinomouse_categorized_blog should return true
		return true;
	} else {
		// This blog has only 1 category so albinomouse_categorized_blog should return false
		return false;
	}
}

/**
 * Flush out the transients used in albinomouse_categorized_blog
 * @since AlbinoMouse 1.0
 */
function albinomouse_category_transient_flusher() {
	// Like, beat it. Dig?
	delete_transient( 'all_the_cool_cats' );
}
add_action( 'edit_category', 'albinomouse_category_transient_flusher' );
add_action( 'save_post', 'albinomouse_category_transient_flusher' );
