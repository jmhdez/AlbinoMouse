<?php
/**
 * The template used for displaying page content in page.php
 *
 * @package AlbinoMouse
 * @since AlbinoMouse 1.0
 */
?>

<?php $options = get_option( 'albinomouse' ); ?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<header class="entry-header">
		<h2 class="entry-title"><?php the_title(); ?></h2>
	</header><!-- end .entry-header -->

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
		<?php edit_post_link( __( '<i class="icon-pencil"></i> Edit', 'albinomouse' ), '<div class="edit-link">', '</div>' ); ?>
	</div><!-- end .entry-content -->
	
	<footer class="entry-footer-meta clear">
		<div class="social-buttons clear">
		<?php if(isset($options['social-media-location']['page']) and $options['social-media-location']['page'] == '1' ) :
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
	</footer><!-- end .entry-footer-meta .clear -->
		
</article><!-- end #post-<?php the_ID(); ?> -->