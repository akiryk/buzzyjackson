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

get_header(); 
$postID = get_the_ID();
?>

    <section class="home-hero">
      <div class="home-hero-intro centered-module">
        <?php 
          $heroimage = get_post_meta( $postID, 'meta-image', true );
          $url = get_post_meta( $postID, 'mb-landing-page-url', true );
          if( !empty( $heroimage ) ): ?>
            <figure class="hero-image margin-block">
              <?php if( !empty( $url ) ) { ?>
                <a href="<?php echo $url; ?>"><img src="<?php echo $heroimage; ?>"/> </a>
              <?php } else { ?>
                <img src="<?php echo $heroimage; ?>"/> 
              <?php } ?>
            </figure>
        <?php endif; ?>

        <?php
          $title = get_post_meta( $postID, 'mb-book-title-1', true );
          if( !empty( $title ) ): ?>
            <h1 class="book-title margin-block">
              <?php if( !empty( $url ) ) { ?>
                <a href="<?php echo $url; ?>"><?php echo $title; ?></a>
              <?php } else { 
                echo $title; 
               } ?>
            </h1>
        <?php endif; ?>

        <?php
          $subtitle = get_post_meta( $postID, 'mb-book-subheading-1', true );
          if( !empty( $subtitle ) ): ?>
            <div class="book-subtitle margin-block">
              <?php echo $subtitle; ?>
            </div>
        <?php endif; ?>

          <?php
            $callout = get_post_meta( $postID, 'mb-callout-primary', true );
            if( !empty( $callout ) ): ?>
              <?php $callout_style = get_post_meta( $postID, 'mb-callout-style', true ); ?>
              <div class="callout <?php echo $callout_style; ?> margin-block">
                <span><?php echo $callout; ?></span>
              </div>
            <?php endif; ?>
            <?php $callout_secondary = get_post_meta( $postID, 'mb-callout-secondary', true ); ?>
            <?php if( !empty( $callout_secondary ) ): ?>
              <div class="callout-meta margin-block">
                <?php echo $callout_secondary; ?>
              </div>
            <?php endif; ?>
          </div>
          <div class="connections-wrapper">
            <?php get_template_part( 'social' );           // facebook, twitter ?>
          </div>
       
        <div class="home-hero-body">

          <?php while ( have_posts() ) : the_post(); ?>
            <?php  get_template_part( 'content', 'page' ); ?>
          <?php endwhile; // end of the loop. ?>

        </div><!-- .main-body -->
    
      </div>
    </section><!-- content -->

    <section class="secondary-heros">
      <div class="site-content entry-content">
      <?php 
      $secondary_title = get_post_meta( $postID, 'mb-secondary-title', true );
      if( !empty( $secondary_title ) ): ?>
        <h2 class="secondary-title">
          <?php echo $secondary_title; ?>
        </h2>
      <?php endif; ?>
      
      <?php $books = get_post_meta( $postID, 'mb-secondary-books', true ); ?>
      <?php foreach ($books as $book) { ?>
        <div class="secondary-book">
          <figure class="secondary-book-image">
            <a href="<?php echo $book['book-url']; ?>">
              <img src="<?php echo $book['meta-image']; ?>" alt="Book Cover: <?php echo $book['title']; ?>" />
            </a>
          </figure>
          <div class="secondary-book-text">
            <h2 class="secondary-book-title">
              <a href="<?php echo $book['book-url']; ?>"><?php echo $book['title']; ?></a>
            </h2>
            <div class="secondary-subtitle"><?php echo $book['subtitle']; ?></div>
            <div class="secondary-book-description">
            <p>
              <?php echo $book['desc']; ?>
            </p>
            <div class="secondary-purchase">
              <a class="button button-tiny" href="<?php echo $book['url']; ?>">Buy Now</a> 
            </div>
          </div>
          </div>
        </div><!-- promo-beta -->
      <?php } ?>

        <footer class="entry-footer">
          <?php edit_post_link( __( 'Edit', 'buzzyjackson_s' ), '<span class="edit-link">', '</span>' ); ?>
        </footer><!-- .entry-footer -->
      </div>
      </section>
    </div><!-- .sub-wrapper-inner -->
  </div><!-- .sub-wrapper-outer -->

<?php get_footer(); ?>
