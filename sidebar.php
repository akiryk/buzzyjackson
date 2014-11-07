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
I"M SIDEBAR!!!
<div id="secondary" class="widget-area" role="complementary">
	<?php dynamic_sidebar( 'sidebar-1' ); ?>
</div><!-- #secondary -->
