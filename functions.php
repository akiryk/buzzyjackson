<?php
/**
 * buzzyjackson_s functions and definitions
 *
 * @package buzzyjackson_s
 */

/**
 * Set the content width based on the theme's design and stylesheet.
 */
if ( ! isset( $content_width ) ) {
	$content_width = 640; /* pixels */
}

if ( ! function_exists( 'buzzyjackson_s_setup' ) ) :
/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support for post thumbnails.
 */
function buzzyjackson_s_setup() {

	/*
	 * Make theme available for translation.
	 * Translations can be filed in the /languages/ directory.
	 * If you're building a theme based on buzzyjackson_s, use a find and replace
	 * to change 'buzzyjackson_s' to the name of your theme in all the template files
	 */
	load_theme_textdomain( 'buzzyjackson_s', get_template_directory() . '/languages' );

	// Add default posts and comments RSS feed links to head.
	add_theme_support( 'automatic-feed-links' );

	/*
	 * Enable support for Post Thumbnails on posts and pages.
	 *
	 * @link http://codex.wordpress.org/Function_Reference/add_theme_support#Post_Thumbnails
	 */
	add_theme_support( 'post-thumbnails' );
  
  /*
   * Add image size(s) for special uses of featured image
   *
   */
  add_image_size( $background, 1600, 1000 ); 

	// This theme uses wp_nav_menu() in one location.
	register_nav_menus( array(
		'primary' => __( 'Primary Menu', 'buzzyjackson_s' ),
	) );

	/*
	 * Switch default core markup for search form, comment form, and comments
	 * to output valid HTML5.
	 */
	add_theme_support( 'html5', array(
		'search-form', 'comment-form', 'comment-list', 'gallery', 'caption',
	) );

	/*
	 * Enable support for Post Formats.
	 * See http://codex.wordpress.org/Post_Formats
	 */
	add_theme_support( 'post-formats', array(
		'aside', 'image', 'video', 'quote', 'link',
	) );

	// Set up the WordPress core custom background feature.
	add_theme_support( 'custom-background', apply_filters( 'buzzyjackson_s_custom_background_args', array(
		'default-color' => 'ffffff',
		'default-image' => '',
	) ) );
}
endif; // buzzyjackson_s_setup
add_action( 'after_setup_theme', 'buzzyjackson_s_setup' );


/**
 * Remove <p> tags from around images
 *
 * @link http://css-tricks.com/snippets/wordpress/remove-paragraph-tags-from-around-images/
 */
function filter_ptags_on_images($content){
   return preg_replace('/<p>\s*(<a .*>)?\s*(<img .* \/>)\s*(<\/a>)?\s*<\/p>/iU', '\1\2\3', $content);
}

add_filter('the_content', 'filter_ptags_on_images');

/**
 * Remove width and height attr from images
 */
add_filter( 'post_thumbnail_html', 'remove_width_attribute', 10 );
add_filter( 'image_send_to_editor', 'remove_width_attribute', 10 );

function remove_width_attribute( $html ) {
   $html = preg_replace( '/(width|height)="\d*"\s/', "", $html );
   return $html;
}
/**
 * Register widget area.
 *
 * @link http://codex.wordpress.org/Function_Reference/register_sidebar
 */
function buzzyjackson_s_widgets_init() {
	register_sidebar( array(
		'name'          => __( 'Sidebar', 'buzzyjackson_s' ),
		'id'            => 'sidebar-1',
		'description'   => '',
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h1 class="widget-title">',
		'after_title'   => '</h1>',
	) );
}
add_action( 'widgets_init', 'buzzyjackson_s_widgets_init' );

/**
 * Enqueue scripts and styles.
 */
function buzzyjackson_s_scripts() {
	wp_enqueue_style( 'buzzyjackson_s-style', get_stylesheet_uri() );

	wp_enqueue_script( 'font-scripts', get_template_directory_uri() . '/js/google-fonts.js', array(), '20141010', false );

  wp_enqueue_script( 'main', get_template_directory_uri() . '/js/main.js', array( 'jquery' ), '201410', true);  

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'buzzyjackson_s_scripts' );


/**
 * Enable custom classes
 */
add_filter( 'mce_buttons_2', 'my_mce_buttons_2' );

function my_mce_buttons_2( $buttons ) {
    array_unshift( $buttons, 'styleselect' );
    return $buttons;
}

/*
* Callback function to filter the MCE settings
*/
function my_mce_before_init( $settings ) {

    $style_formats = array(
        array(
          'title' => 'Simple call-out',
          'selector' => 'p',
          'classes' => 'simple-callout',
          'wrapper' => true
        ),
        array(
        	'title' => 'Block quote title',
        	'selector' => 'p',
        	'classes' => 'quote-title no-initial-cap',
        	'wrapper' => true
        ),
        array(
        	'title' => 'Block quote source',
        	'inline' => 'span',
        	'classes' => 'quote-source',
        	'wrapper' => true
        ),
        array(
          'title' => 'Remove initial cap',
          'selector' => 'p',
          'classes' => 'no-initial-cap',
          'wrapper' => true
        ),
        array(
          'title' => 'Add Initial Cap',
          'selector' => 'p',
          'classes' => 'add-initial-cap',
          'wrapper' => true
        ),
        array(
          'title' => 'Pull Quote Left',
          'selector' => 'p',
          'classes' => 'pull-quote pull-left',
          'wrapper' => true
        ),
        array(
          'title' => 'Pull Quote Right',
          'selector' => 'p',
          'classes' => 'pull-quote push-right',
          'wrapper' => true
        ),
        array(
          'title' => 'Button Super',
          'selector' => 'a',
          'classes' => 'button button-super',
          'wrapper' => false
        ),
        array(
          'title' => 'Button Normal',
          'selector' => 'a',
          'classes' => 'button button-normal',
          'wrapper' => false
        ),
        array(
          'title' => 'Buy Link',
          'selector' => 'a',
          'classes' => 'buy-link',
          'wrapper' => false
        ),
        array(
          // For posts that are book reviews.
          'title' => 'Book Review Intro',
          'selector' => 'p',
          'classes' => 'book-review-intro no-initial-cap',
          'wrapper' => true
        )
    );

    $settings['style_formats'] = json_encode( $style_formats );
    return $settings;
}

add_filter( 'tiny_mce_before_init', 'my_mce_before_init' );

// change buttons in WYSWIG post editor, edit color palette
function my_mce4_options( $init ) {
  $default_colours = '"000000", "Black"';
  $custom_colours = '
      "b71909", "Burnt Red", "2b8fcb", "Link Blue", "666666", "Gray", "999999", "Light Gray"
  ';
  $init['textcolor_map'] = '['.$default_colours.','.$custom_colours.']'; // build colour grid default+custom colors
  $init['textcolor_rows'] = 6; // enable 6th row for custom colours in grid
  return $init;
}
add_filter('tiny_mce_before_init', 'my_mce4_options');


function add_my_editor_style() {
	add_editor_style();
}

add_action( 'admin_init', 'add_my_editor_style' );

/**
 * Apply styles to the visual editor
 */  
add_filter( 'mce_css', 'fb_mcekit_editor_style');
function fb_mcekit_editor_style($url) {

    if ( ! empty( $url ) )
        $url .= ',';

    // Retrieves the plugin directory URL
    // Change the path here if using different directories
    $url .= trailingslashit( plugin_dir_url( __FILE__ ) ) . 'editor-style.css';

    return $url;
}

/**
* Image sizes
*/
add_image_size( 'extra-large', 1200 ); 


add_filter( 'image_size_names_choose', 'my_custom_sizes' );

function my_custom_sizes( $sizes ) {
    return array_merge( $sizes, array(
        'extra-large' => __( 'Extra Large' ),
    ) );
}
/**
****************************************************************
********* END CUSTOM CLASSES ***********************************
****************************************************************
**/

function buzzyjackson_s_theme_customizer( $wp_customize ) {
  $wp_customize->add_section( 'buzzyjackson_s_logo_section' , array(
    'title'       => __( 'Logo', 'buzzyjackson' ),
    'priority'    => 30,
    'description' => 'Upload a logo to replace the default site name and description in the header',
	) );
	$wp_customize->add_setting( 'buzzyjackson_s_logo' );
	$wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, 'buzzyjackson_s_logo', array(
    'label'    => __( 'Logo', 'themeslug' ),
    'section'  => 'buzzyjackson_s_logo_section',
    'settings' => 'buzzyjackson_s_logo',
) ) );
}
add_action('customize_register', 'buzzyjackson_s_theme_customizer');


/**
 * Enable svg uploads
 */
// function cc_mime_types($mimes) {
//   $mimes['svg'] = 'image/svg+xml';
//   return $mimes;
// }
// add_filter('upload_mimes', 'cc_mime_types');


add_filter('upload_mimes', 'custom_upload_mimes');

function custom_upload_mimes ( $existing_mimes=array() ) {

  // add the file extension to the array

  $existing_mimes['svg'] = 'mime/type';

        // call the modified list of extensions

  return $existing_mimes;

}

/**
 * Implement the Custom Header feature.
 */
//require get_template_directory() . '/inc/custom-header.php';

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Custom functions that act independently of the theme templates.
 */
require get_template_directory() . '/inc/extras.php';

/**
 * Customizer additions.
 */
require get_template_directory() . '/inc/customizer.php';

/**
 * Load Jetpack compatibility file.
 */
require get_template_directory() . '/inc/jetpack.php';

/**
 * Custom navigation
 */
require_once (get_template_directory() . '/inc/custom-nav.php');

/**
 * Custom comments
 */
require_once (get_template_directory() . '/inc/custom-comments.php');
