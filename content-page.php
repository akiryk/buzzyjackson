<?php
/**
 * The template used for displaying page content in page.php
 *
 * @package buzzyjackson_s
 */
?>
<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<!-- <header class="entry-header">
		<?php //the_title( '<h1 class="entry-title">', '</h1>' ); ?>
	</header> .entry-header --> 

	<div class="entry-content">
		<?php the_content(); ?>
		<?php
			wp_link_pages( array(
				'before' => '<div class="page-links">' . __( 'Pages:', 'buzzyjackson_s' ),
				'after'  => '</div>',
			) );
		?>

		<footer class="entry-footer">
		<?php edit_post_link( __( 'Edit', 'buzzyjackson_s' ), '<div class="edit-button-container">', '</div>' ); ?>
	</footer><!-- .entry-footer -->
	
	</div><!-- .entry-content -->

</article><!-- #post-## -->
