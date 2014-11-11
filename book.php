<?php
/**
* Template Name: Book
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site will use a
 * different template.
 *
 * @package buzzyjackson_s
 */

get_header(); 
$postID = get_the_ID();
?>

    <section class="home-hero">
      <div class="home-hero-intro centered-module">
        <?php 
          $heroimage = get_post_meta( $postID, 'meta-image', true );
          $url = get_post_meta( $postID, 'mb-landing-page-url', true );
          if( !empty( $heroimage ) ): ?>
            <figure class="hero-image">
              <?php if( !empty( $url ) ) { ?>
                <a href="<?php echo $url; ?>"><img src="<?php echo $heroimage; ?>"/> </a>
              <?php } else { ?>
                <img src="<?php echo $heroimage; ?>"/> 
              <?php } ?>
            </figure>
        <?php endif; ?>

        <?php the_title( sprintf( '<h1 class="book-title margin-block">', esc_url( get_permalink() ) ), '</h1>' ); ?>

        <?php
          $subtitle = get_post_meta( $postID, 'mb-book-subheading-1', true );
          if( !empty( $subtitle ) ): ?>
            <div class="book-subtitle margin-block">
              <?php echo $subtitle; ?>
            </div>
        <?php endif; ?>

        <?php
          $callout = get_post_meta( get_the_ID(), 'mb-purchase-callout', true );
          if( !empty( $callout ) ): ?>
            <div class="purchase-callout margin-block">
              <?php echo $callout; ?>
            </div>
        <?php endif; ?>

        <?php
          $buy_url = get_post_meta( get_the_ID(), 'mb-buy-link-url', true );
          if( !empty( $buy_url ) ): ?>
            <?php $buylink_style = get_post_meta( get_the_ID(), 'mb-buy-button-style', true ); ?>
            <?php $buylink_text = get_post_meta( get_the_ID(), 'mb-buy-button-text', true ); ?>
            <p class="margin-block">
              <a class="button <?php echo $buylink_style; ?>" href="<?php echo esc_url( $buy_url ); ?>"><?php echo $buylink_text; ?></a>
            </p>
          <?php endif; ?>
        </div>
        <div class="connections-wrapper">
          <div class="connections">
            <div class="connections__title">Connect</div>
            <ul class="connections__list">
              <li><a class="connections__list--link facebook" href="www.facebook.com">Facebook</a></li>
              <li><a class="connections__list--link twitter" href="www.facebook.com">Twitter</a></li>
            </ul>
          </div>
        </div>
        <div class="home-hero-body content">

          <?php while ( have_posts() ) : the_post(); ?>
            <?php  get_template_part( 'content', 'page' ); ?>
          <?php endwhile; // end of the loop. ?>

        </div><!-- .main-body -->
    
      </div>
    </section><!-- content -->

<?php get_footer(); ?>
