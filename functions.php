<?php
// Kcher theme functions and definitions
if (! isset($content_width)) {
  $content_width = 1200;
}

if ( ! function_exists( 'kcher_setup' )) :

  function kcher_setup() {
    // make theme available for translation.
    // Translations can be placed in the /languages/ directory.
    load_theme_textdomain( 'kcher', get_template_directory() . '/languages' );
    // Add default posts and comments RSS feed links to <head>.
    add_theme_support( 'automatic-feed-links' );
    // Enable support for post thumbnails and featured images.
    add_theme_support( 'post-thumbnails' );
    // Add support for two custom navigation menus.
    register_nav_menus( array(
      'primary' => __( 'Главное меню', 'kcher' ),
      'secondary' => __( 'Второе меню', 'kcher' )
    ));
    // Enable support for the following post formats:
    // aside, gallery, quote, image, and video
    add_theme_support( 'post-formats', array ( 'aside', 'gallery', 'quote', 'image', 'video' ));
  }
endif;
// kcher
add_action( 'after_setup_theme', 'kcher_setup' );

// Adding theme customizer support
function kcher_theme_customizer($wp_customize) {
$wp_customize->add_section('kcher_logo_section', array(
  'title' => __('Logo', 'kcher'),
  'priority' => 30,
  'description' => 'Загрузите лого'
));
$wp_customize->add_setting('kcher_logo');
$wp_customize->add_control( new WP_Customize_Image_Control($wp_customize, 'kcher', array(
  'label' => __('Логотип', 'kcher'),
  'section' => 'kcher_logo_section',
  'settings' => 'kcher_logo',
)));
}
add_action('customize_register', 'kcher_theme_customizer');

/**
* Enqueue scripts and styles for the front end.
*
*/

// Enqueue google fonts

function add_google_fonts() {

wp_register_style('googlefont_kurale', 'http://fonts.googleapis.com/css?family=Kurale');
wp_enqueue_style('googlefont_kurale');

wp_register_style('googlefont_badscript', 'http://fonts.googleapis.com/css?family=Bad+Script');
wp_enqueue_style('googlefont_badscript');
}
add_action('wp_enqueue_scripts','add_google_fonts');


add_action( 'wp_enqueue_scripts', 'prefix_enqueue_awesome' );
/**
 * Register and load font awesome CSS files using a CDN.
 *
 * @link   http://www.bootstrapcdn.com/#fontawesome
 * @author FAT Media
 */
function prefix_enqueue_awesome() {
  wp_enqueue_style( 'prefix-font-awesome', '//maxcdn.bootstrapcdn.com/font-awesome/4.6.3/css/font-awesome.min.css', array(), '4.6.3' );
}

function kcher_scripts() {
  // Load bxslider stylesheet
  wp_enqueue_style('bxslider_style', get_template_directory_uri() . '/js/jquery.bxslider.css');
  // Load our main stylesheet
  wp_enqueue_style('kcher_style', get_stylesheet_uri());


  wp_enqueue_script( 'bxslider', get_template_directory_uri() . '/js/jquery.bxslider.min.js', array ( 'jquery' ), true);
  wp_enqueue_script( 'script', get_template_directory_uri() . '/js/script.js', array ('bxslider'), true);

}
add_action('wp_enqueue_scripts', 'kcher_scripts');

// Register sidebars
function kcher_widgets_init() {
 
  register_sidebar( array(
    'name' => __('Иконки соц.сетей в подвале', 'kcher'),
    'id' => 'social',
    'before_widget' => '',
    'after_widget' => ''
  ));
}
add_action('widgets_init', 'kcher_widgets_init');

