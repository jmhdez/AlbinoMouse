<?php
/**
 * A unique identifier is defined to store the options in the database and reference them from the theme.
 * By default it uses the theme name, in lowercase and without spaces, but this can be changed if needed.
 * If the identifier changes, it'll appear as if the options have been reset.
 */


function albinomouseoptions_option_name() {

	$albinomouseoptions_settings = get_option('albinomouseoptions');
	
	// Edit 'options-theme-customizer' and set your own theme name instead
	$albinomouseoptions_settings['id'] = 'albinomouse';
	update_option('albinomouseoptions', $albinomouseoptions_settings);
}


function albinomouseoptions_options() {

	// Footer widgets array
	$footer_widgets_array = array(
		'one' => __('One', 'albinomouse'),
		'two' => __('Two', 'albinomouse'),
		'three' => __('Three', 'albinomouse'),
		'four' => __('Four', 'albinomouse'),
	);	

	// Background Defaults
	$background_defaults = array(
		'color' => '',
		'image' => '',
		'repeat' => 'repeat',
		'position' => 'top center',
		'attachment'=>'scroll' );

	// Directory path to image radio buttons
	$imagepath =  get_template_directory_uri() . '/inc/options/images/';

	$options = array();

	$options[] = array(
		'name' => __('Global', 'albinomouse'),
		'type' => 'heading');

	$options[] = array(
		'name' => __('Link and Footer Color', 'albinomouse'),
		'desc' => __('Choose your own link and footer color.', 'albinomouse'),
		'id' => 'link_footer_color',
		'std' => '#e3272d',
		'type' => 'color' );

	$options[] = array(
		'name' =>  __('General Background', 'albinomouse'),
		'desc' => __('Change the background of your site.', 'albinomouse'),
		'id' => 'general-background',
		'std' => $background_defaults,
		'type' => 'background' );

	$options[] = array(
		'name' => __('Favicon', 'albinomouse'),
		'desc' => __('Customize your website with your own Favicon.', 'albinomouse'),
		'id' => 'favicon-upload',
		'std' => '',
		'type' => 'upload');

	$options[] = array(
		'name' => __('Title Font', 'albinomouse'),
		'desc' => __('Choose your favorite google web font.', 'albinomouse'),
		'id' => 'title_font',
		'std' => 'Bitter',
		'type' => 'images',
		'options' => array(
			'Anton' => $imagepath . 'Font_Anton.png',
			'Bitter' => $imagepath . 'Font_Bitter.png',
			'Droid Sans' => $imagepath . 'Font_Droid_Sans.png',
			'Droid Serif' => $imagepath . 'Font_Droid_Serif.png',
			'Open Sans' => $imagepath . 'Font_Open_Sans.png',
			'Source Sans Pro' => $imagepath . 'Font_Source_Sans_Pro.png',
			'Ubuntu' => $imagepath . 'Font_Ubuntu.png',
			'Yanone Kaffeesatz' => $imagepath . 'Font_Yanone_Kaffeesatz.png'));

	$options[] = array(
		'name' => __('General Font', 'albinomouse'),
		'desc' => __('Choose your favorite google web font.', 'albinomouse'),
		'id' => 'general_font',
		'std' => 'Open Sans',
		'type' => 'images',
		'options' => array(
			'Droid Sans' => $imagepath . 'Font_Droid_Sans.png',
			'Droid Serif' => $imagepath . 'Font_Droid_Serif.png',
			'Open Sans' => $imagepath . 'Font_Open_Sans.png',
			'Source Sans Pro' => $imagepath . 'Font_Source_Sans_Pro.png',
			'Ubuntu' => $imagepath . 'Font_Ubuntu.png'));
		
	/*-----------------------------------------------*/		

	$options[] = array(
		'name' => __('Header', 'albinomouse'),
		'type' => 'heading');

	$options[] = array(
		'name' => __('Header Background', 'albinomouse'),
		'desc' => __('Set the header background.', 'albinomouse'),
		'id' => 'header-background',
		'std' => 'light-gray',
		'type' => 'radio',
		'options' => array(
			'transparent' => __('Transparent', 'albinomouse'),
			'light-gray' => __('Gray semi-transparent', 'albinomouse')));
		
	$options[] = array(
		'name' => __('Replace the title with your logo', 'albinomouse'),
		'desc' => __('Upload your logo via the familiar media upload window. Press &#171;Use This Image&#187; to close the window. The Logo will now appear instead of the title of your website.', 'albinomouse'),
		'id' => 'logo-upload',
		'std' => '',
		'type' => 'upload');

	$options[] = array(
		'name' => __('Title and description alignment', 'albinomouse'),
		'desc' => __('Set the alignment of the title/logo and your site description.', 'albinomouse'),
		'id' => 'branding-alignment',
		'std' => 'left',
		'type' => 'radio',
		'options' => array(
			'left' => __('Left', 'albinomouse'),
			'center' => __('Center', 'albinomouse')));

	$options[] = array(
		'name' => __('Description of your Site', 'albinomouse'),
		'desc' => __('Display the description (Tagline) on your site.', 'albinomouse'),
		'id' => 'site-description',
		'std' => '1',
		'type' => 'checkbox');

	$options[] = array(
		'name' => __('Header Search Box', 'albinomouse'),
		'desc' => __('Display the search box in the header of your site.', 'albinomouse'),
		'id' => 'search-box',
		'std' => '1',
		'type' => 'checkbox');

	/*-----------------------------------------------*/	

	$options[] = array(
		'name' => __('Content', 'albinomouse'),
		'type' => 'heading');
	
	$options[] = array(
		'name' => __('Post Thumbnails', 'albinomouse'),
		'desc' => __('Choose the size of your post thumbnails.', 'albinomouse'),
		'id' => 'thumbnail-size',
		'std' => 'banner',
		'type' => 'radio',
		'options' => array(
			'thumbnail' => __('Content thumbnail (floated). See general settings.', 'albinomouse'),
			'banner' => __('Header banner (750 x 250 pixel). Already existing images need to be regenerated.', 'albinomouse')));
		
	$options[] = array(
		'name' => __('Sidebar Layout', 'albinomouse'),
		'desc' => __('Choose one of the possible layout options.', 'albinomouse'),
		'id' => 'sidebar-layout',
		'std' => '2c-r',
		'type' => 'images',
		'options' => array(
			'2c-r' => $imagepath . 'sidebar-right.png',
			'2c-rs' => $imagepath . 'sidebar-right-small.png',
			'2c-l' => $imagepath . 'sidebar-left.png',
			'2c-ls' => $imagepath . 'sidebar-left-small.png',
			'1col' => $imagepath . 'no-sidebar.png'));

	/*-----------------------------------------------*/	

	$options[] = array(
		'name' => __('Footer', 'albinomouse'),
		'type' => 'heading');
				
	$options[] = array(
		'name' => __('Footer Layout', 'albinomouse'),
		'desc' => __('How many widgets do you have to load into the footer?', 'albinomouse'),
		'id' => 'footer-layout',
		'std' => '3col',
		'type' => 'images',
		'options' => array(
			'1col' => $imagepath . 'footer-one-col.png',
			'2col' => $imagepath . 'footer-two-col.png',
			'3col' => $imagepath . 'footer-three-col.png',
			'4col' => $imagepath . 'footer-four-col.png'));

	$options[] = array(
		'name' => __('Custom Copyright Text', 'albinomouse'),
		'desc' => __('Change the default copyright text.', 'albinomouse'),
		'id' => 'copyright-text',
		'std' => '',
		'type' => 'textarea');

	$options[] = array(
		'name' => __('Show some Love!', 'albinomouse'),
		'desc' => __('Display a link to WordPress and the theme author.', 'albinomouse'),
		'id' => 'show-love',
		'std' => '1',
		'type' => 'checkbox');	

	/*-----------------------------------------------*/	

	$options[] = array(
		'name' => __('Extend', 'albinomouse'),
		'type' => 'heading');

	$options[] = array(
		'name' => __('Redesign Jetpacks social buttons (Flat Design)', 'albinomouse'),
		'desc' => __("Replace the styles of Jetpacks social sharing buttons. <strong>Obviously the plugin Jetpack must be installed as well as the module Sharing must be activated.</strong> This option will automatically deregister the original stylesheet.", "albinomouse"),
		'id' => 'flat-social-btn',
		'std' => '0',
		'type' => 'checkbox');
		
	$options[] = array(
		'name' => __('Recommended Plugin: Bootstrap Shortcodes', 'albinomouse'),
		'desc' => __('Use the power of Bootstrap 3.0 which is implemented in AlbinoMouse 2.0. With the plugin <a href="http://wordpress.org/plugins/bootstrap-shortcodes/">Bootstrap Shortcodes</a> you will be able to use the <strong>grid system, buttons, notifications, collapse and glyphicons</strong> quite easily.<br/>When you installed that plugin, go to the settings and deactivate the loading of css and js files (AlbinoMouse has already included).', 'albinomouse'),
		'type' => 'info');

	/*-----------------------------------------------*/	

	$options[] = array(
		'name' => 'Credits',
		'type' => 'heading');
		
	$options[] = array(
		'name' =>	'AlbinoMouse is built on the following frameworks:',
		'desc' =>	'<ul>
						<li><a href="https://github.com/twbs/bootstrap">Bootstrap 3</a> by Mark Otto and Jacob Thornton (Apache License)</li>
						<li>The starter theme <a href="https://github.com/Automattic/_s/">underscores</a> by Automattic</li>
						<li><a href="http://wptheming.com/options-framework-theme/">Options Framework Theme</a> by Devin Price (GPL v2)</li>
					</ul>',
		'type' =>	'info');

	$options[] = array(
		'name' =>	'There is even more great stuff included:',
		'desc' =>	'<ul>
						<li><a href="https://github.com/twittem/wp-bootstrap-navwalker">wp-bootstrap-navwalker</a> by @tittem (GPL v2)</li>
						<li>phpColors by Arlo Carreon (MIT)</li>
						<li><a href="https://github.com/davatron5000/FitVids.js">FitVids]</a> by Chris Coyier and Paravel (WTFPL)</li>
						<li>Glyphicons Halflings by Jan Kovařík comes with Bootstrap 3 (same license)</li>
						<li>Some icons from Socialicous by Shali Nguyen (MIT)</li>
						<li>Some icons from Font Awesome by Dave Gandy (SIL OFL 1.1)</li>
					</ul>',
		'type' =>	'info');

	$options[] = array(
		'name' =>	'These guys make AlbinoMouse international:',
		'desc' =>	'<ul>
						<li>French translation by <a href="http://effingo.be/contact/">Alexis Jurdant</a></li>
						<li>German translation by <a href="http://pixelstrol.ch/">myself, Stefan Brechbühl</a></li>
						<li>Polish translation by <a href="http://blog.13mhz.kapa.pl/">Michał Hunger</a></li>
						<li>Spanish translation by <a href="http://pablolaguna.es/">Pablo Laguna</a></li>
					</ul>',
		'type' =>	'info');
	
	return $options;
}