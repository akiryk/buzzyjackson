<?php
/**
* Template Name: Single
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site will use a
 * different template.
 *
 * @package buzzyjackson_s
 */

get_header(); 
?>

    <?php $url = wp_get_attachment_url( get_post_thumbnail_id($post->ID) ); ?>
    <?php $image_treatment = get_post_meta( $post->ID, 'mb-image-style', true ); ?>

    <?php if ($image_treatment == 'feature-super' && has_post_thumbnail()) { ?>
      <?php // use featured as a background image in css ?>
      <?php $placement = get_post_meta( $post->ID, 'mb-image-placement', true ); ?>
      <div class="full-width-image" style="background-image:url(<?php echo $url; ?>); background-position-y:<?php echo $placement; ?>"></div>
       <?php the_title( sprintf( '<h1 class="book-title post-title-wide margin-block">', esc_url( get_permalink() ) ), '</h1>' ); ?>
       <section class="home-hero centered-module">
    <?php } else { ?>
      <?php // use featured image as a normal image ?>
    <section class="home-hero">
      <div class="home-hero-intro centered-module">
        <?php if ( has_post_thumbnail() ) : ?>
          <figure class="margin-block featured-image">
            <?php the_post_thumbnail('large'); ?>
          </figure>
        <?php endif; ?>

        <?php the_title( sprintf( '<h1 class="book-title margin-block">', esc_url( get_permalink() ) ), '</h1>' ); ?>

    <?php } // end image_treatment if/else ?>

        <div class="timestamp">
          <span><?php buzzyjackson_s_posted_on(); ?></span>
        </div>
        <div class="connections-wrapper-post">
          <?php get_template_part( 'social' );           // facebook, twitter ?>
        </div>
      </div>

      <div class="home-hero-body content">
    
        <?php while ( have_posts() ) : the_post(); ?>
          <?php  get_template_part( 'content', 'single' ); ?>
        <?php endwhile; // end of the loop. ?>

      </div><!-- .main-body -->
    
    </section><!-- content -->
    <?php
      // If comments are open or we have at least one comment, load up the comment template
      if ( comments_open() || get_comments_number() ) : ?>
        <div class="comments-wrapper">
          <?php comments_template(); ?>
        </div>
      <?php endif; ?>

<?php get_footer(); ?>
