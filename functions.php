<?php
/**
 * AlbinoMouse functions and definitions
 *
 * @package AlbinoMouse
 * @since AlbinoMouse 1.0
 */

/**
 * Set the content width based on the theme's design and stylesheet.
 *
 * @since AlbinoMouse 1.0
 */
if ( ! isset( $content_width ) )
	$content_width = 600; /* pixels */

if ( ! function_exists( 'albinomouse_setup' ) ):
/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which runs
 * before the init hook. The init hook is too late for some features, such as indicating
 * support post thumbnails.
 *
 * @since AlbinoMouse 1.0
 */
function albinomouse_setup() {

	// Custom template tags for this theme.
	require( get_template_directory() . '/inc/template-tags.php' );

	// Custom Theme Options
	if ( !function_exists( 'optionsframework_init' ) ) {
		define( 'OPTIONS_FRAMEWORK_DIRECTORY', get_template_directory_uri() . '/inc/' );
		require_once dirname( __FILE__ ) . '/inc/options-framework.php';
	}
	
	// Shortcodes for this theme
	require( get_template_directory() . '/inc/shortcodes.php' );

	// Show the theme styles in the visual editor with editor-style.css.
	add_editor_style('style-editor.css');
	
	// Make theme available for translation
	load_theme_textdomain( 'albinomouse', get_template_directory() . '/languages' );

	// Add default posts and comments RSS feed links to head
	add_theme_support( 'automatic-feed-links' );

	// Enable support for Post Thumbnails
	add_theme_support( 'post-thumbnails' );	

	// This theme uses wp_nav_menu() in one location.
	register_nav_menus( array(
		'primary' => __( 'Primary Menu', 'albinomouse' ),
	) );

	// Add support for the Aside Post Formats
	add_theme_support( 'post-formats', array( 'aside', 'gallery', 'image', 'link', 'quote', 'video' ) );
}
endif; // albinomouse_setup
add_action( 'after_setup_theme', 'albinomouse_setup' );

/**
 * Replace excerpt ellipsis with permalink 
 * @since AlbinoMouse 1.2
 */
remove_filter('the_excerpt', 'wptexturize');

function new_excerpt_more($more) {
	global $post;
    return '... <p><a href="'. get_permalink($post->ID) . '" class="more-link">Seguir leyendo <span class="icon-chevron-right"></span></a></p>';
}
add_filter('excerpt_more', 'new_excerpt_more');

/**
 * walker_nav_menu to add icon before menu link
 * Write the name of icon as link description e.g. icon-home 
 * @since AlbinoMouse 1.1.2
 */
class albinomouse_walker_nav_menu extends Walker_Nav_Menu {
function start_el(&$output, $item, $depth=0, $args=array(), $current_object_id=0 )
{
   global $wp_query;
   $indent = ( $depth ) ? str_repeat( "\t", $depth ) : '';

   $class_names = $value = '';

   $classes = empty( $item->classes ) ? array() : (array) $item->classes;

   $class_names = join( ' ', apply_filters( 'nav_menu_css_class', array_filter( $classes ), $item ) );
   $class_names = ' class="'. esc_attr( $class_names ) . '"';

   $output .= $indent . '<li id="menu-item-'. $item->ID . '"' . $value . $class_names .'>';

   $attributes  = ! empty( $item->attr_title ) ? ' title="'  . esc_attr( $item->attr_title ) .'"' : '';
   $attributes .= ! empty( $item->target )     ? ' target="' . esc_attr( $item->target     ) .'"' : '';
   $attributes .= ! empty( $item->xfn )        ? ' rel="'    . esc_attr( $item->xfn        ) .'"' : '';
   $attributes .= ! empty( $item->url )        ? ' href="'   . esc_attr( $item->url        ) .'"' : '';

   $description  = ! empty( $item->description ) ? esc_attr( $item->description ) : '';

   $item_output = $args->before;
   $item_output .= '<a'. $attributes .'>';
   $item_output .= $args->link_before .'<i class="'.$description.'"></i>';
   $item_output .= apply_filters( 'the_title', $item->title, $item->ID );
   $item_output .= $args->link_after;
   $item_output .= '</a>';
   $item_output .= $args->after;

   $output .= apply_filters( 'walker_nav_menu_start_el', $item_output, $item, $depth, $args );
   }
}
 
/**
 * Register widgetized area and update sidebar with default widgets
 * @since AlbinoMouse 1.0
 */
function albinomouse_widgets_init() {
	$options = get_option( 'albinomouse' );
	if ($options['sidebar-layout'] != '1col') {
		register_sidebar( array(
			'name' => __( 'Sidebar', 'albinomouse' ),
			'id' => 'sidebar',
			'before_widget' => '<aside id="%1$s" class="widget %2$s">',
			'after_widget' => '</aside>',
			'before_title' => '<h4 class="widget-title">',
			'after_title' => '</h4>',
		) );
	}
	if ($options['footer-layout']) {
		register_sidebar( array(
			'name' => __( 'Footer 1', 'albinomouse' ),
			'id' => 'footer-1',
			'before_widget' => '<aside id="%1$s" class="widget %2$s">',
			'after_widget' => '</aside>',
			'before_title' => '<h4 class="widget-title">',
			'after_title' => '</h4>',
		) );
	}	
	if ($options['footer-layout'] == '2col' || $options['footer-layout'] == '3col' || $options['footer-layout'] == '4col') {
		register_sidebar( array(
			'name' => __( 'Footer 2', 'albinomouse' ),
			'id' => 'footer-2',
			'before_widget' => '<aside id="%1$s" class="widget %2$s">',
			'after_widget' => '</aside>',
			'before_title' => '<h4 class="widget-title">',
			'after_title' => '</h4>',
		) );
	}
	if ($options['footer-layout'] == '3col' || $options['footer-layout'] == '4col') {
		register_sidebar( array(
			'name' => __( 'Footer 3', 'albinomouse' ),
			'id' => 'footer-3',
			'before_widget' => '<aside id="%1$s" class="widget %2$s">',
			'after_widget' => '</aside>',
			'before_title' => '<h4 class="widget-title">',
			'after_title' => '</h4>',
		) );
	}
	if ($options['footer-layout'] == '4col') {
		register_sidebar( array(
			'name' => __( 'Footer 4', 'albinomouse' ),
			'id' => 'footer-4',
			'before_widget' => '<aside id="%1$s" class="widget %2$s">',
			'after_widget' => '</aside>',
			'before_title' => '<h4 class="widget-title">',
			'after_title' => '</h4>',
		) );
	}	
}
add_action( 'widgets_init', 'albinomouse_widgets_init' );

/**
 * Enqueue scripts and styles
 * @since AlbinoMouse 1.0
 */
function albinomouse_s() {

	wp_enqueue_style( 'style', get_stylesheet_uri() );
	wp_enqueue_style( 'font-awesome', get_template_directory_uri() . '/font-awesome/css/font-awesome.min.css' );

	wp_enqueue_script( 'small-menu', get_template_directory_uri() . '/js/small-menu.js', array( 'jquery' ), '20120206', true );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'albinomouse_s' );

/**
 * Register and Enqueue Socialite
 * @since AlbinoMouse 1.0
 */
function albinomouse_load_socialite() {
    // Register Socialite
    wp_register_script( 'socialite', get_template_directory_uri() . '/js/socialite.min.js', array(), '', true );
    // Register social initialiser script
    wp_register_script( 'social', get_template_directory_uri() . '/js/social.js', array('jquery', 'socialite'), '', true );
    // Now enqueue Socialite
    wp_enqueue_script( 'social' );
}
add_action( 'wp_enqueue_scripts', 'albinomouse_load_socialite' );

/**
 * Enqueue stylesheet for Google web fonts
 * This function is attached to the wp_head action hook.
 * @since AlbinoMouse 1.0
 */
function albinomouse_google_web_fonts() {
	$options = get_option( 'albinomouse' );

	if ($options['title_font'] == 'Anton') {
		wp_enqueue_style( 'Anton', 'https://fonts.googleapis.com/css?family=Anton' );
	}
	if ($options['general_font'] == 'Oxygen') {
		wp_enqueue_style( 'Oxygen', 'https://fonts.googleapis.com/css?family=Oxygen:400,700,400italic,700italic' );
	}
	if ($options['title_font'] == 'Bitter') {
		wp_enqueue_style( 'Bitter', 'https://fonts.googleapis.com/css?family=Bitter' );
	}
	if ($options['title_font'] == 'Droid Sans' || $options['general_font'] == 'Droid Sans') {
		wp_enqueue_style( 'DroidSans', 'https://fonts.googleapis.com/css?family=Droid+Sans:400,700' );
	}
	if ($options['title_font'] == 'Droid Serif' || $options['general_font'] == 'Droid Serif') {
		wp_enqueue_style( 'DroidSerif', 'https://fonts.googleapis.com/css?family=Droid+Serif:400,700,400italic,700italic' );
	}
	if ($options['title_font'] == 'Open Sans' || $options['general_font'] == 'Open Sans') {
		wp_enqueue_style( 'OpenSans', 'https://fonts.googleapis.com/css?family=Open+Sans:400italic,700italic,400,700' );
	}
	if ($options['title_font'] == 'Source Sans Pro' || $options['general_font'] == 'Source Sans Pro') {
		wp_enqueue_style( 'SourceSansPro', 'https://fonts.googleapis.com/css?family=Source+Sans+Pro:400,700,400italic,700italic' );
	}	
	if ($options['title_font'] == 'Ubuntu' || $options['general_font'] == 'Ubuntu') {
		wp_enqueue_style( 'Ubuntu', 'https://fonts.googleapis.com/css?family=Ubuntu:400,700,400italic,700italic' );
	}
	if ($options['title_font'] == 'Yanone Kaffeesatz') {
		wp_enqueue_style( 'YanoneKaffeesatz', 'https://fonts.googleapis.com/css?family=Yanone+Kaffeesatz' );
	}			
}
add_action( 'wp_enqueue_scripts', 'albinomouse_google_web_fonts' );


/**
 * Add a style block with some configurations of the theme options.
 * This function is attached to the wp_head action hook.
 * @since AlbinoMouse 1.0
 */
function albinomouse_add_custom_styles() {
	$options = get_option( 'albinomouse' );
	$link_color = $options['link_footer_color'];
	$header_bg = $options['header-background'];
	$footer_cols = $options['footer-layout'];
	?>
	
	<style type="text/css">
	/*--- Link and Footer Color ---*/
	a,
	a:visited,
	.post-format-icon a:link,
	#footer h4,
	#footer h4 a,
	.main-small-navigation li:before {
		color: <?php echo $link_color ?>;
	}
	button,
	html input[type="button"],
	input[type="reset"],
	input[type="submit"],
	.main-navigation li,
	.main-navigation ul ul li,
	h1.menu-toggle,
	.nav-previous,
	.nav-next,
	.link-button,
	.more-link,
	#footer,
	.comments-area .reply,
	p.biglink {
		background-color: <?php echo $link_color ?>;
	}
	
	/*--- General Background ---*/
	<?php if ($options['general-background']['color'] !='') : ?>
	body { 
		background-color: <?php echo $options['general-background']['color'] ?>;
	}
	<?php endif;
	if ($options['general-background']['image'] != '') : ?>
	body { 
		background-attachment: <?php echo $options['general-background']['attachment'] ?>;
		background-image: url(<?php echo $options['general-background']['image'] ?>);
		background-position: <?php echo $options['general-background']['position'] ?>;
		background-repeat: <?php echo $options['general-background']['repeat'] ?>;
	}
	<?php endif; ?>
		
	/*--- Typography ---*/
	<?php if ($options['title_font'] == 'Anton') { ?>
	h1, h2, h3, h4, h5, h6 { font-family: 'Anton', sans-serif; } 
	h1.entry-title {line-height: 1.1;} <?php
	}
	if ($options['title_font'] == 'Bitter') { ?>
	h1, h2, h3, h4, h5, h6 { font-family: 'Bitter', sans-serif; }
	h1.entry-title {line-height: 1.2;} <?php
	}
	if ($options['title_font'] == 'Droid Sans') { ?>
	h1, h2, h3, h4, h5, h6 { font-family: 'Droid Sans', sans-serif; }
	h1.entry-title {line-height: 1.15;} <?php
	}
	if ($options['general_font'] == 'Droid Sans') { ?>
	body, button, input, select, textarea {	font-family: 'Droid Sans', sans-serif; } <?php
	}
	if ($options['title_font'] == 'Droid Serif') { ?>
	h1, h2, h3, h4, h5, h6 { font-family: 'Droid Serif', sans-serif; }
	h1.entry-title {line-height: 1.15;} <?php
	}
	if ($options['general_font'] == 'Droid Serif') { ?>
	body, button, input, select, textarea {	font-family: 'Droid Serif', sans-serif; } <?php
	}
	if ($options['title_font'] == 'Open Sans') { ?>
	h1, h2, h3, h4, h5, h6 { font-family: 'Open Sans', sans-serif; line-height: 1.15; }
	h1.entry-title {line-height: 1.1;} <?php
	}
	if ($options['general_font'] == 'Open Sans') { ?>
	body, button, input, select, textarea {	font-family: 'Open Sans', sans-serif; } <?php
	}
	if ($options['title_font'] == 'Source Sans Pro') { ?>
	h1, h2, h3, h4, h5, h6 { font-family: 'Source Sans Pro', sans-serif; }
	h1.entry-title {line-height: 1.1;} <?php
	}
	if ($options['general_font'] == 'Source Sans Pro') { ?>
	body, button, input, select, textarea {	font-family: 'Source Sans Pro', sans-serif; } <?php
	}
	if ($options['title_font'] == 'Ubuntu') { ?>
	h1, h2, h3, h4, h5, h6 { font-family: 'Ubuntu', sans-serif; line-height: 1.15; }
	h1.entry-title {line-height: 1.1;} <?php
	}
	if ($options['general_font'] == 'Ubuntu') { ?>
	body, button, input, select, textarea {	font-family: 'Ubuntu', sans-serif; } <?php
	}
	if ($options['general_font'] == 'Oxygen') { ?>
	body, button, input, select, textarea {	font-family: 'Oxygen', sans-serif; } <?php
	}
	if ($options['title_font'] == 'Yanone Kaffeesatz') { ?>
	h1, h2, h3, h4, h5, h6 { font-family: 'Yanone Kaffeesatz', sans-serif; line-height: 1.1; }
	h1.entry-title {line-height: 1.1;} <?php
	} ?>
	
	</style>
<?php
}
add_action( 'wp_head', 'albinomouse_add_custom_styles' );

/**
 * Add a layout class to the array of body classes.
 * This function is attached to the wp_head filter hook.
 * @since AlbinoMouse 1.0
 */

function albinomouse_body_class_sidebar( $existing_classes ) {
	$options = get_option( 'albinomouse' );
	$sidebar = $options['sidebar-layout'];
	
	if ($sidebar == '1col') { 
	$body_class = array( 'sidebar-off' );
	}
	else {
	$body_class = array( 'sidebar-right' );
	}
		
	$body_class = apply_filters( 'albinomouse_layout_classes', $body_class, $sidebar );

	return array_merge( $existing_classes, $body_class );
}
add_filter( 'body_class', 'albinomouse_body_class_sidebar' );


/**
 * Add a layout class to the array of body classes.
 * This function is attached to the wp_head filter hook.
 * @since AlbinoMouse 1.0
 */

function albinomouse_body_class_footer( $existing_classes ) {
	$options = get_option( 'albinomouse' );
	$footer = $options['footer-layout'];
	
	if ($footer == '1col') { 
		$body_class = array( 'footer-one' );
	}
	elseif ($footer == '2col') {
		$body_class = array( 'footer-two' );
	} 
	elseif ($footer == '3col') {
		$body_class = array( 'footer-three' );
	}	
	else {
		$body_class = array( 'footer-four' );
	}
		
	$body_class = apply_filters( 'albinomouse_layout_classes', $body_class, $footer );

	return array_merge( $existing_classes, $body_class );
}
add_filter( 'body_class', 'albinomouse_body_class_footer' );

?>