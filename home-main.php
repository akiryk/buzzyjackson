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

        <?php
          $title = get_post_meta( get_the_ID(), 'mb-book-title-1', true );
          if( !empty( $title ) ): ?>
            <h1 class="book-title--alpha">
              <?php if( !empty( $url ) ) { ?>
                <a href="<?php echo $url; ?>"><?php echo $title; ?></a>
              <?php } else { 
                echo $title; 
               } ?>
            </h1>
        <?php endif; ?>

        <?php
          $subtitle = get_post_meta( get_the_ID(), 'mb-book-subheading-1', true );
          if( !empty( $subtitle ) ): ?>
            <div class="subtitle--alpha">
              <?php echo $subtitle; ?>
            </div>
        <?php endif; ?>

        <div class="centered-module">
          <?php
            $callout = get_post_meta( get_the_ID(), 'mb-callout-primary', true );
            if( !empty( $callout ) ): ?>
              <?php $callout_style = get_post_meta( get_the_ID(), 'mb-callout-style', true ); ?>
              <div class="callout <?php echo $callout_style; ?>">
                <span><?php echo $callout; ?></span>
              </div>
            <?php endif; ?>
            <?php $callout_secondary = get_post_meta( get_the_ID(), 'mb-callout-secondary', true ); ?>
            <?php if( !empty( $callout_secondary ) ): ?>
              <div class="callout-meta">
                <?php echo $callout_secondary; ?>
              </div>
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
 <div class="sub-wrapper-outer">
    <div class="sub-wrapper-inner">
    <?php 
      $secondary_title = get_post_meta( get_the_ID(), 'mb-secondary-title', true );
      if( !empty( $secondary_title ) ): ?>
        <h2 class="section-title">
          <?php echo $secondary_title; ?>
        </h2>
      <?php endif; ?>
      
      <section class="promo-beta-group">
        <?php $books = get_post_meta( get_the_ID(), 'mb-secondary-books', true ); ?>
        <?php foreach ($books as $book) { ?>
          <div class="promo-beta">
            <figure class="promo-image mini">
              <a href="<?php echo $book['book-url']; ?>">
                <img src="<?php echo $book['meta-image']; ?>" alt="Book Cover: <?php echo $book['title']; ?>" />
              </a>
            </figure>
            <div class="beta-body">
              <h2 class="book-title--beta">
                <a href="<?php echo $book['book-url']; ?>"><?php echo $book['title']; ?></a>
              </h2>
              <div class="subtitle--beta"><?php echo $book['subtitle']; ?></div>
            </div>
            <div class="beta-desc">
              <p>
                <?php echo $book['desc']; ?>
              </p>
              <div class="purchase">
                <a href="<?php echo $book['url']; ?>">Buy <?php echo $book['title']; ?></a> 
              </div>
            </div>
          </div><!-- promo-beta -->
        <?php } ?>

      </section>
    </div><!-- .sub-wrapper-inner -->
  </div><!-- .sub-wrapper-outer -->
<footer class="entry-footer">
  <?php edit_post_link( __( 'Edit', 'buzzyjackson_s' ), '<span class="edit-link">', '</span>' ); ?>
</footer><!-- .entry-footer -->

<?php get_footer(); ?>
