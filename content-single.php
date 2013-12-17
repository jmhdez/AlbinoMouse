<?php
/**
 * @package AlbinoMouse
 * @since AlbinoMouse 1.0
 */
?>

<?php $options = get_option( 'albinomouse' ); ?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<header class="entry-header">	
		<?php if ( 'post' == get_post_type() ) :
			if ( get_post_format() ) : ?>
				<span class="post-format-icon format-<?php echo get_post_format(); ?>"></span>
			<?php else: ?>
				<span class="post-format-icon format-standard"></span>
			<?php endif; // End if get_post_format
		endif; // End if 'post' == get_post_type ?>
		<h1 class="entry-title"><?php the_title(); ?></h1>
	</header><!-- End .entry-header -->	
	
	<div class="entry-content">
		<div class="clear">
			<?php if (has_post_thumbnail() && isset($options['thumbnail-size'])) : ?>
				<?php echo get_the_post_thumbnail($post->ID, $options['thumbnail-size']); ?>
			<?php else : ?>
				<?php echo get_the_post_thumbnail($post->ID, 'large'); ?>
			<?php endif; ?>
			<?php the_content(); ?>
		</div><!-- .clear -->
		<?php wp_link_pages( array( 'before' => '<div class="page-links">' . __( 'Pages:', 'albinomouse' ), 'after' => '</div>' ) ); ?>
		<?php edit_post_link( __( '<i class="icon-pencil"></i> Edit', 'albinomouse' ), '<span class="edit-link">', '</span>' ); ?>
	</div><!-- .entry-content -->
	
	<footer class="entry-footer-meta clear">
	
		<?php if ( get_the_author_meta( 'description' ) && ( is_multi_author() ) ) : // If a user has filled out their description and this is a multi-author blog, show a bio on their entries ?>
		<div class="author-info">
			<div class="author-avatar">
				<?php echo get_avatar( get_the_author_meta( 'user_email' ), apply_filters( 'albinomouse_author_bio_size', 60 ) ); ?>
			</div><!-- End .author-avatar -->
			<div class="author-description">
				<h6><?php printf( __( 'About %s', 'albinomouse' ), get_the_author() ); ?></h6>
				<?php the_author_meta( 'description' ); ?>
				<div class="author-link">
					<a href="<?php echo esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ); ?>" rel="author">
						<?php printf( __( '<strong>View all posts by %s</strong> <i class="icon-arrow-right"></i>', 'albinomouse' ), get_the_author() ); ?>
					</a>
				</div><!-- End .author-link	-->
			</div><!-- End .author-description -->
		</div><!-- End .entry-author-info -->
		<?php endif; ?>

		<p class="post-info">
			<?php
			$arc_year = get_the_time('Y'); 
			$arc_month = get_the_time('m'); 
			$arc_day = get_the_time('d');
			?>
			<span class="release-date"><i class="icon-calendar"></i> <?php the_time(get_option('date_format')); ?></span>
			<span class="sep author-link"> | </span>
			<span class="author-link"><i class="icon-user"></i> <?php the_author_link(); ?> </span>
			<?php if ( ! post_password_required() && ( comments_open() || '0' != get_comments_number() ) ) : ?>
				<span class="sep comments-link"> | </span>
				<span class="comments-link"><i class="icon-comment"> </i><?php comments_popup_link( __( 'Leave a comment', 'albinomouse' ), __( '1 Comment', 'albinomouse' ), __( '% Comments', 'albinomouse' ) ); ?> </span>
			<?php endif; ?>
			<br/>					
			<?php /* translators: used between list items, there is a space after the comma */
			$categories_list = get_the_category_list( __( ', ', 'albinomouse' ) );
			if ( $categories_list && albinomouse_categorized_blog() ) : ?>
			<span class="cat-links">
				<i class="icon-folder-open"></i>
				<?php printf($categories_list); ?>
			</span>
			<br/>
			<?php endif; // End if categories ?>	
			<?php /* translators: used between list items, there is a space after the comma */
			$tags_list = get_the_tag_list( '', __( ', ', 'albinomouse' ) );
			if ($tags_list) : ?>
			<span class="tag-links">
				<i class="icon-tag"></i>
				<?php printf($tags_list); ?>
			</span>
			<?php endif; // End if $tags_list ?>
		</p><!-- End .post-info -->

		<div class="social-buttons clear">
		<?php if(isset($options['social-media-location']['single']) and $options['social-media-location']['single'] == '1' ) :
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
			
		<?php albinomouse_content_nav( 'nav-below' ); ?>
		
	</footer><!-- End .entry-footer-meta .clear -->
	
</article><!-- #post-<?php the_ID(); ?> -->
