<?php
/**
 * @package AlbinoMouse
 * @since AlbinoMouse 1.0
 */
?>

<?php $options = get_option( 'albinomouse' ); ?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<header class="entry-header">	
		<a href="<?php the_permalink(); ?>" title="<?php printf( esc_attr__( 'Permalink to %s', 'albinomouse' ), the_title_attribute( 'echo=0' ) ); ?>" rel="bookmark">
			<?php if ( is_sticky() ) : // Only display if is sticky
			echo __( '<span class="featured">Featured</span>', 'albinomouse' );
			endif; ?>
			<?php if ( 'post' == get_post_type() ) :
				if ( get_post_format() ) : ?>
					<span class="post-format-icon format-<?php echo get_post_format(); ?>"></span>
				<?php else: ?>
					<span class="post-format-icon format-standard"></span>
				<?php endif; // End if get_post_format
			endif; // End if 'post' == get_post_type ?>
			<h1 class="entry-title"><?php the_title(); ?></h1>
		</a>
	</header><!-- End .entry-header -->
	<?php if ( is_search() ) : // Only display Excerpts for Search ?>
	<div class="entry-summary clear">
			<?php if (has_excerpt()) {
				// if it has a custom excerpt
				the_excerpt(); ?>
				<p><a class="more-link" href="<?php the_permalink() ?>"><?php __( '<span class="icon-plus-sign"></span> Continue reading', 'albinomouse' ) ?></a></p> <?php
			} elseif (strpos($post->post_content, '<!--more-->')) {
				// if it it has a break tag
				the_content( __( '<span class="icon-plus-sign"></span> Continue reading', 'albinomouse' ) );
			} else {
				// display the default excerpt
				the_excerpt();
			}
			?>
	</div><!-- End .entry-summary -->
	<?php else : ?>
	<div class="entry-content">
		<div class="clear">
			<?php if (has_post_thumbnail() && isset($options['thumbnail-size'])) : ?>
				<a href="<?php the_permalink(); ?>" title="<?php printf( esc_attr__( 'Permalink to %s', 'albinomouse' ), the_title_attribute( 'echo=0' ) ); ?>" rel="bookmark">
				<?php echo get_the_post_thumbnail($post->ID, $options['thumbnail-size']); ?>
				</a>
			<?php else : ?>
				<a href="<?php the_permalink(); ?>" title="<?php printf( esc_attr__( 'Permalink to %s', 'albinomouse' ), the_title_attribute( 'echo=0' ) ); ?>" rel="bookmark">
				<?php echo get_the_post_thumbnail($post->ID, 'large'); ?>
				</a>	
			<?php endif; ?>
			<?php the_content( __( '<span class="icon-plus-sign"></span> Continue reading', 'albinomouse' ) ); ?>
		</div><!-- .clear -->	
		<?php wp_link_pages( array( 'before' => '<div class="page-links">' . __( 'Pages:', 'albinomouse' ), 'after' => '</div>' ) ); ?>
	</div><!-- End .entry-content -->
	<?php endif; ?>	
	<footer class="entry-footer-meta clear">
	<?php if ( 'post' == get_post_type() ) : ?>
	
		<p class="post-info">		
			<?php
			$arc_year = get_the_time('Y'); 
			$arc_month = get_the_time('m'); 
			$arc_day = get_the_time('d');
			?>
			<span class="release-date"><i class="icon-calendar"></i> <a href="<?php echo get_day_link($arc_year, $arc_month, $arc_day); ?>"><?php the_time(get_option('date_format')); ?></a></span>
			<span class="sep author-link"> | </span>
			<span class="author-link"><i class="icon-user"></i> <?php the_author_link(); ?> </span>
			<?php if ( ! post_password_required() && ( comments_open() || '0' != get_comments_number() ) ) : ?>
				<span class="sep comments-link"> | </span>
				<span class="comments-link"><i class="icon-comment"> </i><?php comments_popup_link( __( 'Leave a comment', 'albinomouse' ), __( '1 Comment', 'albinomouse' ), __( '% Comments', 'albinomouse' ) ); ?> </span>
			<?php endif; ?>		
			<br/>					
			<?php // translators: used between list items, there is a space after the comma
			$categories_list = get_the_category_list( __( ', ', 'albinomouse' ) );
			if ( $categories_list && albinomouse_categorized_blog() ) : ?>
			<span class="cat-links">
				<i class="icon-folder-open"></i>
				<?php printf($categories_list); ?>
			</span>
			<br/>
			<?php endif; // End if categories ?>
			<?php // translators: used between list items, there is a space after the comma
			$tags_list = get_the_tag_list( '', __( ', ', 'albinomouse' ) );
			if ($tags_list) : ?>
			<span class="tag-links">
				<i class="icon-tag"></i>
				<?php printf($tags_list); ?>
			</span>
			<?php endif; // End if $tags_list ?>
		</p><!--End .post-infos -->
		
		<div class="social-buttons clear">
		<?php if(isset($options['social-media-location']['post']) and $options['social-media-location']['post'] == '1' ) :
			// Twitter Button
			if(isset($options['social-media-buttons']['twitter']) and $options['social-media-buttons']['twitter'] == '1' ) : ?>
				<div class="share-on-twitter">
					<a href="http://twitter.com/share" class="socialite twitter-share" data-text="<?php the_title(); ?> &#187;" data-url="<?php echo wp_get_shortlink(); ?>" data-count="horizontal" rel="nofollow" target="_blank"><span class="vhidden">Share on Twitter</span></a>
				</div><?php 			
			endif;
			if(isset($options['social-media-buttons']['googleplus']) and $options['social-media-buttons']['googleplus'] == '1' ) : ?>
				<div class="share-on-googleplus">
					<a href="https://plus.google.com/share?url=<?php echo get_permalink(); ?>" class="socialite googleplus-one" data-size="medium" data-href="<?php echo get_permalink(); ?>" rel="nofollow" target="_blank"><span class="vhidden">Share on Google+</span></a>
				</div> <?php 
			endif;
			if(isset($options['social-media-buttons']['facebook']) and $options['social-media-buttons']['facebook'] == '1' ) : ?>
				<div class="share-on-facebook">
					<a href="http://www.facebook.com/sharer.php?u=<?php echo get_permalink(); ?>&amp;t=<?php echo urlencode(get_the_title()); ?>" class="socialite facebook-like" data-href="<?php echo get_permalink(); ?>" data-send="false" data-layout="button_count" data-width="60" data-show-faces="false" rel="nofollow" target="_blank"> <span class="vhidden">Facebook</span></a>
				</div> <?php 	
			endif;
		endif; ?>	
		</div><!-- end .social-buttons .clear -->	
		
		<?php endif; // End if 'post' == get_post_type() ?>
		
		<?php edit_post_link( __( '<i class="icon-pencil"></i> Edit', 'albinomouse' ), '<span class="edit-link">', '</span>' ); ?>
		
	</footer><!-- end .entry-footer-meta .clear -->	
</article><!-- #post-<?php the_ID(); ?> -->