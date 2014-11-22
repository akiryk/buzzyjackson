<?php
/**
 * The sidebar containing the main widget area.
 *
 * @package buzzyjackson_s
 */

if ( ! is_active_sidebar( 'sidebar-1' ) ) {
	return;
}
?>

<div id="secondary" class="entry-content">
  <?php if ( has_nav_menu( 'secondary' ) ) : ?>
  <nav role="navigation" class="navigation site-navigation secondary-navigation">
    <?php wp_nav_menu( array( 'theme_location' => 'secondary' ) ); ?>
  </nav>
  <?php endif; ?>

  <?php if ( is_active_sidebar( 'sidebar-1' ) ) : ?>
  <div id="primary-sidebar" class="primary-sidebar widget-area" role="complementary">
    <?php dynamic_sidebar( 'sidebar-1' ); ?>
  </div><!-- #primary-sidebar -->
  <?php endif; ?>
</div><!-- #secondary -->
