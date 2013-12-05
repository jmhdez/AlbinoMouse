<?php
/**
 * A unique identifier is defined to store the options in the database and reference them from the theme.
 * By default it uses the theme name, in lowercase and without spaces, but this can be changed if needed.
 * If the identifier changes, it'll appear as if the options have been reset.
 */


function optionsframework_option_name() {

	$optionsframework_settings = get_option('optionsframework');
	
	// Edit 'options-theme-customizer' and set your own theme name instead
	$optionsframework_settings['id'] = 'albinomouse';
	update_option('optionsframework', $optionsframework_settings);
}


function optionsframework_options() {

	// Footer widgets array
	$footer_widgets_array = array(
		'one' => __('One', 'albinomouse'),
		'two' => __('Two', 'albinomouse'),
		'three' => __('Three', 'albinomouse'),
		'four' => __('Four', 'albinomouse'),
	);	

	// Social Media Buttons Defaults
	$socialmediabuttons_defaults = array(
		'twitter' => '0',
		'googleplus' => '0',
		'facebook' => '0'	
	);

	// Social Media Location Defaults
	$socialmedialocations_defaults = array(
		'post' => '0',
		'single' => '0',
		'page' => '0'		
	);
	
	// Social Media Options
	$socialmedia_options = array(
		'twitter' => __('Tweet Button (Twitter)', 'albinomouse'),
		'googleplus' => __('+1 Button (Google+)', 'albinomouse'),
		'facebook' => __('Like Button (Facebook)', 'albinomouse')
	);

	// Social Media Locations
	$socialmedia_locations = array(
		'post' => __('Posts', 'albinomouse'),
		'single' => __('Single Post', 'albinomouse'),
		'page' => __('Pages', 'albinomouse')
	);	

	// Background Defaults
	$background_defaults = array(
		'color' => '',
		'image' => '',
		'repeat' => 'repeat',
		'position' => 'top center',
		'attachment'=>'scroll' );

	// Directory path to image radio buttons
	$imagepath =  get_template_directory_uri() . '/inc/images/';

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
		'name' => __('Title Font', 'albinomouse'),
		'desc' => __('Choose your favorite google web font.', 'albinomouse'),
		'id' => 'title_font',
		'std' => 'Bitter',
		'type' => 'select',
		'options' => array(
			'Anton' => 'Anton',
			'Bitter' => 'Bitter',
			'Droid Sans' => 'Droid Sans',
			'Droid Serif' => 'Droid Serif',
			'Open Sans' => 'Open Sans',
			'Source Sans Pro' => 'Source Sans Pro',
			'Ubuntu' => 'Ubuntu',
			'Yanone Kaffeesatz' => 'Yanone Kaffeesatz'));

	$options[] = array(
		'name' => __('General Font', 'albinomouse'),
		'desc' => __('Choose your favorite google web font.', 'albinomouse'),
		'id' => 'general_font',
		'std' => 'Open Sans',
		'type' => 'select',
		'options' => array(
			'Droid Sans' => 'Droid Sans',
			'Droid Serif' => 'Droid Serif',
			'Open Sans' => 'Open Sans',
			'Source Sans Pro' => 'Source Sans Pro',
			'Ubuntu' => 'Ubuntu'));

	$options[] = array(
		'name' => __('Favicon', 'albinomouse'),
		'desc' => __('Customize your website with your own Favicon.', 'albinomouse'),
		'id' => 'favicon-upload',
		'std' => '',
		'type' => 'upload');
		
	/*-----------------------------------------------*/		

	$options[] = array(
		'name' => __('Header', 'albinomouse'),
		'type' => 'heading');
		
	$options[] = array(
		'name' => __('Your Logo', 'albinomouse'),
		'desc' => __('Upload your logo via the familiar media upload window. Press &#171;Use This Image&#187; to close the window. The Logo will now appear instead of the title of your website.', 'albinomouse'),
		'id' => 'logo-upload',
		'std' => '',
		'type' => 'upload');

	$options[] = array(
		'name' => __('Header Background', 'albinomouse'),
		'desc' => __('Your able to choose between a transparent (same color like the general background) and light gray header background. The light gray header background is slightly transparent as well.', 'albinomouse'),
		'id' => 'header-background',
		'std' => 'light-gray',
		'type' => 'images',
		'options' => array(
			'transparent' => $imagepath . 'transparent-header.png',
			'light-gray' => $imagepath . 'light-gray-header.png'));

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
		'std' => 'large',
		'type' => 'select',
		'options' => array(
			'thumbnail' => __('Thumbnail size', 'albinomouse'),
			'medium' => __('Medium size', 'albinomouse'),
			'large' => __('Large size', 'albinomouse'),
			'full' => __('Full resolution', 'albinomouse')
		));
	
	$options[] = array(
		'name' => __('Social Media Buttons', 'albinomouse'),
		'desc' => __('Which social media buttons do you want to appear below posts?', 'albinomouse'),
		'id' => 'social-media-buttons',
		'std' => $socialmediabuttons_defaults,
		'type' => 'multicheck',		
		'options' => $socialmedia_options);

	$options[] = array(
		'name' => __('Social Media Buttons Locations', 'albinomouse'),
		'desc' => __('Where do you want to see the social media buttons you checked below?', 'albinomouse'),
		'id' => 'social-media-location',
		'std' => $socialmedialocations_defaults,
		'type' => 'multicheck',		
		'options' => $socialmedia_locations);	
		
		
	/*-----------------------------------------------*/	

	$options[] = array(
		'name' => __('Sidebar', 'albinomouse'),
		'type' => 'heading');

	$options[] = array(
		'name' => __('Sidebar Layout', 'albinomouse'),
		'desc' => __('You can disable the sidebar and use the full width for your content.', 'albinomouse'),
		'id' => 'sidebar-layout',
		'std' => '2c-r',
		'type' => 'images',
		'options' => array(
			'1col' => $imagepath . 'no-sidebar.png',
			'2c-r' => $imagepath . 'sidebar-right.png'));

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
	
	return $options;
}