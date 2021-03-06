<?php
/**
 * The template for displaying the footer.
 *
 * Contains the closing of the id=main div and all content after
 *
 * @package AlbinoMouse
 */
?>

	</div><!-- .row -->
	</div><!-- #content -->

	<footer id="colophon" class="site-footer hidden-print" role="contentinfo">
		<div class="container">
		
			<div id="footer-widgets" class="row">
			<?php $options = get_option( 'albinomouse' ); ?>

			<?php if($options['footer-layout'] == '1col') : ?>
				<div id="footer1" class="col-md-12">
			<?php elseif($options['footer-layout'] == '2col') : ?>
				<div id="footer1" class="col-md-6">
			<?php elseif($options['footer-layout'] == '3col') : ?>
				<div id="footer1" class="col-md-4">
			<?php else : ?>
				<div id="footer1" class="col-md-3">
			<?php endif; ?>
					<?php dynamic_sidebar( 'footer-1' ); ?>
				</div>
				
			<?php if($options['footer-layout'] == '1col') : ?>
				<div id="footer2" class="col-md-12">
			<?php elseif($options['footer-layout'] == '2col') : ?>
				<div id="footer2" class="col-md-6">
			<?php elseif($options['footer-layout'] == '3col') : ?>
				<div id="footer2" class="col-md-4">
			<?php else : ?>
				<div id="footer2" class="col-md-3">
			<?php endif; ?>
					<?php dynamic_sidebar( 'footer-2' ); ?>
				</div>
				
			<?php if($options['footer-layout'] == '1col') : ?>
				<div id="footer3" class="col-md-12">
			<?php elseif($options['footer-layout'] == '2col') : ?>
				<div id="footer3" class="col-md-6">
			<?php elseif($options['footer-layout'] == '3col') : ?>
				<div id="footer3" class="col-md-4">
			<?php else : ?>
				<div id="footer3" class="col-md-3">
			<?php endif; ?>
					<?php dynamic_sidebar( 'footer-3' ); ?>
				</div>
				
			<?php if($options['footer-layout'] == '1col') : ?>
				<div id="footer4" class="col-md-12">
			<?php elseif($options['footer-layout'] == '2col') : ?>
				<div id="footer4" class="col-md-6">
			<?php elseif($options['footer-layout'] == '3col') : ?>
				<div id="footer4" class="col-md-4">
			<?php else : ?>
				<div id="footer4" class="col-md-3">
			<?php endif; ?>
					<?php dynamic_sidebar( 'footer-4' ); ?>
				</div>
				
			</div><!-- #footer-widgets -->
		
			<div class="site-info">
				<?php do_action( 'albinomouse_credits' ); ?>
				
				<?php if(!isset($options['copyright-text']) or $options['copyright-text'] == '' ) { ?>
						&#169; Copyright <?php echo date("Y"); ?> <?php echo(bloginfo( 'name' ));
					} else {
						echo $options['copyright-text']; 
					} ?>
					
				<?php if(!isset($options['show-love']) or $options['show-love'] == '1' ) : ?>
					
					<span class="sep"> | </span>

					<a href="http://wordpress.org/" title="<?php esc_attr_e( 'A Semantic Personal Publishing Platform', 'albinomouse' ); ?>" rel="generator"><?php printf( __( 'Proudly powered by %s', 'albinomouse' ), 'WordPress' ); ?></a>
					<span class="sep"> | </span>
					<?php printf( __( 'Theme: %1$s by %2$s.', 'albinomouse' ), 'albinomouse', '<a href="http://www.pixelstrol.ch/wp-themes/albinomouse" rel="designer">pixelstrolch</a>' ); ?>
				<?php endif ?>				

			</div><!-- .site-info -->
			
		</div><!-- .container -->
	</footer><!-- #colophon -->
</div><!-- #page -->

<?php wp_footer(); ?>

</body>
</html>