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

get_header(); 
$postID = get_the_ID();
?>

    <section class="home-hero">
      <div class="home-hero-intro centered-module">

        <?php the_title( sprintf( '<h1 class="book-title margin-block">', esc_url( get_permalink() ) ), '</h1>' ); ?>

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
