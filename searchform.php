<?php
/**
 * The template for displaying search forms in AlbinoMouse
 *
 * @package AlbinoMouse
 * @since AlbinoMouse 1.0
 */
?>
	<form method="get" id="searchform" action="<?php echo esc_url( home_url( '/' ) ); ?>" role="search">
		<label for="s" class="assistive-text"><?php _e( 'Search', 'albinomouse' ); ?></label>
		<input type="text" class="field" name="s" id="s" placeholder="<?php esc_attr_e( 'Search', 'albinomouse' ); ?>" />
		<input type="submit" class="submit" name="submit" id="searchsubmit" value="<?php esc_attr_e( 'Search', 'albinomouse' ); ?>" />
	</form>
