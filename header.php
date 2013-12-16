<?php
/* @package AlbinoMouse
 * @since AlbinoMouse 1.0 
 */
?>

<?php $options = get_option( 'albinomouse' ); ?>

<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>" />
<meta name="viewport" content="width=device-width, initial-scale=1.0" />
<title>
	<?php
	//Print the <title> tag based on what is being viewed.
	global $page, $paged;
	wp_title( '|', true, 'right' );
	// Add the blog name.
	bloginfo( 'name' );
	// Add the blog description for the home/front page.
	$site_description = get_bloginfo( 'description', 'display' );
	if ( $site_description && ( is_home() || is_front_page() ) )
		echo " | $site_description";
	// Add a page number if necessary:
	if ( $paged >= 2 || $page >= 2 )
		echo ' | ' . sprintf( __( 'Page %s', 'albinomouse' ), max( $paged, $page ) );
	?>
</title>
<link rel="profile" href="http://gmpg.org/xfn/11" />
<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>" />

<?php if(isset($options['favicon-upload']) and $options['favicon-upload'] != '' ) : ?>
	<link rel="shortcut icon" type="image/ico" href="<?php echo $options['favicon-upload']; ?>" />
<?php endif  ?>

<!--[if lt IE 9]>
	<script src="<?php echo get_template_directory_uri(); ?>/js/html5.js" type="text/javascript"></script>
	<link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/style-ie.css" type="text/css" media="screen" />
<![endif]-->

<?php wp_head(); ?>

<link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/style-koalite.css" type="text/css" media="screen" />
</head>


<body <?php body_class(); ?>>
<div id="page" class="hfeed site">
	<?php do_action( 'before' ); ?>
	<header id="masthead" class="site-header<?php if(!isset($options['header-background']) or $options['header-background'] == 'light-gray' ) : ?> transparent-gray<?php endif; ?>" role="banner">
		<div class="container clear">
			<hgroup class="title-group">
				<?php 
				if(isset($options['logo-upload']) and $options['logo-upload'] != '' ) : ?>
					<h1 class="site-title">
						<a href="<?php echo home_url( '/' ); ?>" title="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>" rel="home" class="site-logo<?php if(!isset($options['site-description']) or $options['site-description'] == '1' ) : ?> title-half-width<?php endif ?>"> 
							<img src="<?php echo $options['logo-upload']; ?>" alt="Logo <?php bloginfo('name'); ?>" title="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>" />
						</a>
					</h1>
				<?php else : ?>
					<h1 class="site-title<?php if(!isset($options['site-description']) or $options['site-description'] == '1' ) : ?> title-half-width<?php endif ?>">
						<a href="<?php echo home_url( '/' ); ?>" title="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>" rel="home">
							<?php bloginfo( 'name' ); ?>				
						</a>
					</h1>
				<?php endif;
				if(!isset($options['site-description']) or $options['site-description'] == '1' ) : ?>
					<h2 class="site-description"><?php bloginfo( 'description' ); ?></h2>
				<?php endif ?>
			</hgroup>		
			
			<hgroup class="nav-group">
				<nav class="site-navigation main-navigation<?php if(!isset($options['search-box']) or $options['search-box'] == '1') : ?> header-with-searchform<?php endif; ?>" role="navigation">
					<h1 class="assistive-text"><?php _e( 'Menu', 'albinomouse' ); ?></h1>
					<div class="assistive-text skip-link"><a href="#content" title="<?php esc_attr_e( 'Skip to content', 'albinomouse' ); ?>"><?php _e( 'Skip to content', 'albinomouse' ); ?></a></div>
					<?php if (has_nav_menu( 'primary' ) ) : ?>
						<?php wp_nav_menu( array( 'container' => '', 'fallback_cb' => '', 'walker' => new albinomouse_walker_nav_menu())); ?>
					<?php else : ?>
						<?php wp_page_menu(); ?>
					<?php endif; ?> 
				</nav>
				<?php if(!isset($options['search-box']) or $options['search-box'] == '1') : ?>
					<aside id="header-searchform">
						<?php get_search_form(); ?>
					</aside>
				<?php endif; ?>	
			</hgroup>

			
		</div> <!-- end .container .clear -->
	</header><!-- end #masthead .site-header -->

	<div id="main" class="container clear">