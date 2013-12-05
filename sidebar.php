<?php
/**
 * The Sidebar containing the main widget areas.
 *
 * @package AlbinoMouse
 * @since AlbinoMouse 1.0
 */
?>

		<div id="sidebar" class="widget-area" role="complementary">
			<?php do_action( 'before_sidebar' ); ?>
			<?php if ( ! dynamic_sidebar( 'sidebar' ) ) : ?>
				
				<aside id="archives" class="widget widget_archive">
					<h4 class="widget-title"><?php _e( 'Archives', 'albinomouse' ); ?></h4>
					<ul>
						<?php wp_get_archives( array( 'type' => 'monthly' ) ); ?>
					</ul>
				</aside>

				<aside id="meta" class="widget widget_meta">
					<h4 class="widget-title"><?php _e( 'Meta', 'albinomouse' ); ?></h4>
					<ul>
						<?php wp_register(); ?>
						<li><?php wp_loginout(); ?></li>
						<?php wp_meta(); ?>
					</ul>
				</aside>
		
		<?php endif; // end sidebar widget area ?>

		</div><!-- end #sidebar .widget-area -->