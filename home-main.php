<?php
/**
* Template Name: Home Main
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site will use a
 * different template.
 *
 * @package buzzyjackson_s
 */

get_header(); ?>

<h1>HELLO Home Main!!!</h1>

<footer class="entry-footer">
  <?php edit_post_link( __( 'Edit', 'buzzyjackson_s' ), '<span class="edit-link">', '</span>' ); ?>
</footer><!-- .entry-footer -->

<?php get_footer(); ?>
