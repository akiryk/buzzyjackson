<?php
/**
 * The header for our theme.
 *
 * Displays all of the <head> section and everything up till <div id="content">
 *
 * @package buzzyjackson_s
 */
?><!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title><?php wp_title( '|', true, 'right' ); ?></title>
<link rel="profile" href="http://gmpg.org/xfn/11">
<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">
<link rel="shortcut icon" href="<?php echo get_stylesheet_directory_uri(); ?>/favicon.ico" />
<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<div id="page" class="hfeed site full-wrapper">
	<a class="assistive-text screen-reader-text" href="#content"><?php _e( 'Skip to content', 'buzzyjackson_s' ); ?></a>

	<header id="masthead" class="header-wrapper" role="banner">
		<div class="brand-wrapper">
			<div class="logo-left"><img src="/wp-content/uploads/2014/10/logo-left-660.png"/></div>
    	<div class="logo">
    		<a href="<?php echo esc_url( home_url( '/' ) ); ?>" class="ir" rel="home"><?php bloginfo( 'name' ); ?>
					<img src="/wp-content/uploads/2014/10/logo-660.png" />
				</a>
    	</div>
    	<div class="logo-right"><img src="/wp-content/uploads/2014/10/logo-right-660.png"/></div>
    </div>
		<nav id="site-navigation" class="main-navigation" role="navigation">
			<button class="menu-toggle"><?php _e( 'Primary Menu', 'buzzyjackson_s' ); ?></button>
			<?php wp_nav_menu( array( 'theme_location' => 'primary' ) ); ?>
		</nav><!-- #site-navigation -->
	</header><!-- #masthead -->

	<div id="content" class="site-content">
