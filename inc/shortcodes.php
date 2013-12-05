<?php
/**
 * Shortcodes for this theme.
 * @package AlbinoMouse
 * @since AlbinoMouse 1.0
 */

/*-- 2 columns ---*/
 
function albinomouse_one_half( $atts, $content = null ) {
   return '<div class="one_half_col">' . do_shortcode($content) . '</div>';
}
add_shortcode('one_half', 'albinomouse_one_half');

function albinomouse_one_half_last( $atts, $content = null ) {
   return '<div class="one_half_col last_col">' . do_shortcode($content) . '</div><div class="clear"></div>';
}
add_shortcode('one_half_last', 'albinomouse_one_half_last');


/*--- 3 columns ---*/

function albinomouse_one_third( $atts, $content = null ) {
   return '<div class="one_third_col">' . do_shortcode($content) . '</div>';
}
add_shortcode('one_third', 'albinomouse_one_third');

function albinomouse_one_third_last( $atts, $content = null ) {
   return '<div class="one_third_col last_col">' . do_shortcode($content) . '</div><div class="clear"></div>';
}
add_shortcode('one_third_last', 'albinomouse_one_third_last');

function albinomouse_two_third( $atts, $content = null ) {
   return '<div class="two_third_col">' . do_shortcode($content) . '</div>';
}
add_shortcode('two_third', 'albinomouse_two_third');

function albinomouse_two_third_last( $atts, $content = null ) {
   return '<div class="two_third_col last_col">' . do_shortcode($content) . '</div><div class="clear"></div>';
}
add_shortcode('two_third_last', 'albinomouse_two_third_last');


/*--- 4 columns ---*/

function albinomouse_one_fourth( $atts, $content = null ) {
   return '<div class="one_fourth_col">' . do_shortcode($content) . '</div>';
}
add_shortcode('one_fourth', 'albinomouse_one_fourth');

function albinomouse_one_fourth_last( $atts, $content = null ) {
   return '<div class="one_fourth_col last_col">' . do_shortcode($content) . '</div><div class="clear"></div>';
}
add_shortcode('one_fourth_last', 'albinomouse_one_fourth_last');

function albinomouse_three_fourth( $atts, $content = null ) {
   return '<div class="three_fourth_col">' . do_shortcode($content) . '</div>';
}
add_shortcode('three_fourth', 'albinomouse_three_fourth');

function albinomouse_three_fourth_last( $atts, $content = null ) {
   return '<div class="three_fourth_col last_col">' . do_shortcode($content) . '</div><div class="clear"></div>';
}
add_shortcode('three_fourth_last', 'albinomouse_three_fourth_last'); 


/*--- Button ---*/

function albinomouse_nav_button( $atts, $content = null ) {
   return '<p class="link-button">' . do_shortcode($content) . '</p>';
}
add_shortcode('button', 'albinomouse_nav_button');

function albinomouse_nav_button_last( $atts, $content = null ) {
   return '<p class="link-button">' . do_shortcode($content) . '</p><div class="clear"></div>';
}
add_shortcode('button_last', 'albinomouse_nav_button_last');

/*--- Biglink ---*/

function albinomouse_biglink( $atts, $content = null ) {
   return '<p class="biglink">' . do_shortcode($content) . '</p><div class="clear"></div>';
}
add_shortcode('biglink', 'albinomouse_biglink');


/*--- Info Boxes ---*/

function albinomouse_info_box( $atts, $content = null ) {
   return '<div class="infobox"><i class="icon-info-sign icon-large"></i> ' . do_shortcode($content) . '</div><div class="clear"></div>';
}
add_shortcode('infobox', 'albinomouse_info_box');

function albinomouse_warning_box( $atts, $content = null ) {
   return '<div class="warningbox"><i class="icon-warning-sign icon-large"></i> ' . do_shortcode($content) . '</div><div class="clear"></div>';
}
add_shortcode('warningbox', 'albinomouse_warning_box');

function albinomouse_success_box( $atts, $content = null ) {
   return '<div class="successbox"><i class="icon-ok-sign icon-large"></i> ' . do_shortcode($content) . '</div><div class="clear"></div>';
}
add_shortcode('successbox', 'albinomouse_success_box');

function albinomouse_error_box( $atts, $content = null ) {
   return '<div class="errorbox"><i class="icon-remove-sign icon-large"></i> ' . do_shortcode($content) . '</div><div class="clear"></div>';
}
add_shortcode('errorbox', 'albinomouse_error_box');
 
?>