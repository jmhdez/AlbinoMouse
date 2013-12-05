<?php
/**
 * The template for displaying 404 pages (Not Found).
 *
 * @package AlbinoMouse
 * @since AlbinoMouse 1.0
 */
?>

<?php get_header(); ?>

<div id="content" class="site-error" role="main">

	<article id="post-0" class="post error404 not-found">
		<header class="entry-header">
			<h1 class="entry-title"><i class="icon-exclamation-sign"></i> <?php _e( 'Oops! That page can&rsquo;t be found.', 'albinomouse' ); ?></h1>
		</header>

		<div class="entry-content">
			<h6><?php _e( 'It looks like nothing was found at this location.<br/>Maybe try one of the links below or a search?', 'albinomouse' ); ?></h6>
			
			<?php the_widget( 'WP_Widget_Recent_Posts', '', array( 'before_widget' => '<div class="widget widget_recent_entries one_third_col">', 'after_widget' => "</div>", 'before_title' => '<h4 class="widget-title">', 'after_title' => '</h4>' ) ); ?>

			<div class="widget widget_categories one_third_col">
				<h4 class="widgettitle"><?php _e( 'Most Used Categories', 'albinomouse' ); ?></h4>
				<ul>
				<?php wp_list_categories( array( 'orderby' => 'count', 'order' => 'DESC', 'show_count' => 1, 'title_li' => '', 'number' => 10 ) ); ?>
				</ul>
			</div>

			<?php the_widget( 'WP_Widget_Tag_Cloud', '', array( 'before_widget' => '<div class="widget widget_tag_cloud one_third_col last_col">', 'after_widget' => "</div>", 'before_title' => '<h4 class="widget-title">', 'after_title' => '</h4>' ) ); ?>

		</div><!-- .entry-content -->
	</article><!-- #post-0 -->

</div><!-- #content -->

<?php get_footer(); ?>