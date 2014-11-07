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
<script type="text/javascript">
WebFontConfig = {
   google: { families: [ 'Lato:300:latin', 'Playfair+Display:900:latin', 'Merriweather:400,700,700italic,400italic:latin' ] }
};
(function() {
  var wf = document.createElement('script');
  wf.src = ('https:' == document.location.protocol ? 'https' : 'http') +
    '://ajax.googleapis.com/ajax/libs/webfont/1/webfont.js';
  wf.type = 'text/javascript';
  wf.async = 'true';
  var s = document.getElementsByTagName('script')[0];
  s.parentNode.insertBefore(wf, s);
})(); </script>
<meta charset="<?php bloginfo( 'charset' ); ?>">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title><?php wp_title( '|', true, 'right' ); ?></title>
<link rel="profile" href="http://gmpg.org/xfn/11">
<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">
<link rel="shortcut icon" href="<?php echo get_stylesheet_directory_uri(); ?>/favicon.ico" type="image/x-icon"/>
<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<div id="page" class="hfeed site full-wrapper">
	<a class="assistive-text screen-reader-text" href="#content"><?php _e( 'Skip to content', 'buzzyjackson_s' ); ?></a>

  

	<header id="masthead" class="header-wrapper" role="banner">
		<div class="brand-wrapper">

      <?php if ( get_theme_mod( 'buzzyjackson_s_logo' ) ) : ?>
        <div class='logo'>
            <a href='<?php echo esc_url( home_url( '/' ) ); ?>' title='<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>' rel='home'><img src='<?php echo esc_url( get_theme_mod( 'buzzyjackson_s_logo' ) ); ?>' alt='<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>'></a>
        </div>
      <?php else : ?>
        <hgroup>
          <h1 class='site-title'>Title: <a href='<?php echo esc_url( home_url( '/' ) ); ?>' title='<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>' rel='home'><?php bloginfo( 'name' ); ?></a></h1>
          <h2 class='site-description'><?php bloginfo( 'description' ); ?></h2>
        </hgroup>
      <?php endif; ?>
    	
    </div>
		<nav id="site-navigation" class="main-navigation" role="navigation">
			<button class="menu-toggle"><?php _e( 'Primary Menu', 'buzzyjackson_s' ); ?></button>
			<?php wp_nav_menu( array( 
          'theme_location' => 'primary',
          'menu_class' => 'menu nav-menu'
        ) ); 
      ?>
		</nav><!-- #site-navigation -->
	</header><!-- #masthead -->

	<div id="content" class="site-content">
