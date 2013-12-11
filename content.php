<?php
/**
 * @package AlbinoMouse
 * @since AlbinoMouse 1.0
 */
?>

<?php $options = get_option( 'albinomouse' ); ?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<header class="entry-header">
		<h2 class="entry-title">	
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
				<?php the_title(); ?>
			</a>
			<br/>
			<small><i class="icon-calendar"></i> <?php the_time(get_option('date_format')); ?>
				<?php // translators: used between list items, there is a space after the comma
				$tags_list = get_the_tag_list( '', __( ', ', 'albinomouse' ) );
				if ($tags_list) : ?>
				<span class="sep tags-link"> | </span>
				<span class="tag-links">
					<i class="icon-tag"></i>
					<?php printf($tags_list); ?>
				</span>
				<?php endif; // End if $tags_list ?>
				<?php if ( ! post_password_required() && ( comments_open() || '0' != get_comments_number() ) ) : ?>
  				<span class="sep comments-link"> | </span>
					<span class="comments-link"><i class="icon-comment"> </i><?php comments_popup_link( __( 'Leave a comment', 'albinomouse' ), __( '1 Comment', 'albinomouse' ), __( '% Comments', 'albinomouse' ) ); ?> </span>
				<?php endif; ?>		
			</small>
		</h2>
	</header><!-- End .entry-header -->
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
	<footer class="entry-footer-meta clear">
	<?php if ( 'post' == get_post_type() ) : ?>
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