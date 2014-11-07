<?php
/**
* Template Name: Book Main
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site will use a
 * different template.
 *
 * @package buzzyjackson_s
 */

get_header(); ?>

  <div class="main-wrapper--outer">
    <div class="main-wrapper--inner">
      <section class="promo">

        <?php 
          $heroimage = get_post_meta( get_the_ID(), 'meta-image', true );
          $url = get_post_meta( get_the_ID(), 'mb-landing-page-url', true );
          if( !empty( $heroimage ) ): ?>
            <figure class="promo-image">
              <?php if( !empty( $url ) ) { ?>
                <a href="<?php echo $url; ?>"><img src="<?php echo $heroimage; ?>"/> </a>
              <?php } else { ?>
                <img src="<?php echo $heroimage; ?>"/> 
              <?php } ?>
              
            </figure>
        <?php endif; ?>

        <?php the_title( sprintf( '<h1 class="book-title--alpha"><a href="%s" rel="bookmark">', esc_url( get_permalink() ) ), '</a></h1>' ); ?>

        <?php
          $subtitle = get_post_meta( get_the_ID(), 'mb-book-subheading-1', true );
          if( !empty( $subtitle ) ): ?>
            <div class="subtitle--alpha">
              <?php echo $subtitle; ?>
            </div>
        <?php endif; ?>

        <div class="centered-module">
          <?php
            $callout = get_post_meta( get_the_ID(), 'mb-purchase-callout', true );
            if( !empty( $callout ) ): ?>
              <div class="purchase-callout">
                <?php echo $callout; ?>
              </div>
          <?php endif; ?>

          <?php
            $buy_url = get_post_meta( get_the_ID(), 'mb-buy-link-url', true );
            if( !empty( $buy_url ) ): ?>
              <?php $buylink_style = get_post_meta( get_the_ID(), 'mb-buy-button-style', true ); ?>
              <?php $buylink_text = get_post_meta( get_the_ID(), 'mb-buy-button-text', true ); ?>
                <a class="button <?php echo $buylink_style; ?>" href="<?php echo esc_url( $buy_url ); ?>"><?php echo $buylink_text; ?></a>
            <?php endif; ?>
          </div>
      </section>

      <section class="content">  
        <div class="connections-wrapper">
          <div class="connections">
            <div class="connections__title">Connect</div>
            <ul class="connections__list">
              <li><a class="connections__list--link facebook" href="www.facebook.com">Facebook</a></li>
              <li><a class="connections__list--link twitter" href="www.facebook.com">Twitter</a></li>
            </ul>
          </div>
        </div>
        <div class="main-body">

          <?php while ( have_posts() ) : the_post(); ?>
            <?php  get_template_part( 'content', 'page' ); ?>
          <?php endwhile; // end of the loop. ?>

        </div><!-- .main-body -->
      </section><!-- content -->
    </div>
  </div>
<footer class="entry-footer">
  <?php edit_post_link( __( 'Edit', 'buzzyjackson_s' ), '<span class="edit-link">', '</span>' ); ?>
</footer><!-- .entry-footer -->

<?php get_footer(); ?>
