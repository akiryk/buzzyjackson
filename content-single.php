<?php
/**
 * @package buzzyjackson_s
 */
?>
<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<div class="entry-content">
		<?php the_content(); ?>

		<?php
			wp_link_pages( array(
				'before' => '<div class="page-links">' . __( 'Pages:', 'buzzyjackson_s' ),
				'after'  => '</div>',
			) );
		?>
	</div><!-- .entry-content -->

	<footer class="entry-footer">
		<?php buzzyjackson_s_entry_footer(); ?>
	</footer><!-- .entry-footer -->
</article><!-- #post-## -->
