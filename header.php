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
<link rel="shortcut icon" href="<?php echo get_stylesheet_directory_uri(); ?>/favicon.ico" type="image/x-icon"/>
<meta name="google-site-verification" content="zoH_RvhDNKTDjgg-KhLgTmKyaGoWsFdnkA9ZNSEln7c" />
<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
  <script>
    (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
    (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
    m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
    })(window,document,'script','//www.google-analytics.com/analytics.js','ga');
    ga('create', 'UA-57871524-1', 'auto');
    ga('send', 'pageview');
  </script>
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

      <?php $walker = new AK_Nav_Walker; ?>
			<?php wp_nav_menu( array(
          'theme_location' => 'primary',
          'menu_class' => 'menu nav-menu',
          'walker' => $walker
        ) );
      ?>

		</nav><!-- #site-navigation -->
	</header><!-- #masthead -->

	<div id="content" class="site-content">
