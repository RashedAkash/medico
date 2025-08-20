<?php
if ( ! function_exists( 'medico_setup' ) ) :
/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support for post thumbnails.
 *
 * @since Twenty Fifteen 1.0
 */
function medico_setup() {

	/*
	 * Make theme available for translation.
	 * Translations can be filed in the /languages/ directory.
	 * If you're building a theme based on twentyfifteen, use a find and replace
	 * to change 'twentyfifteen' to the name of your theme in all the template files
	 */
	load_theme_textdomain( 'medico', get_template_directory() . '/languages' );

	// Add default posts and comments RSS feed links to head.
	add_theme_support( 'automatic-feed-links' );

	/*
	 * Let WordPress manage the document title.
	 * By adding theme support, we declare that this theme does not use a
	 * hard-coded  tag in the document head, and expect WordPress to
	 * provide it for us.
	 */
	add_theme_support( 'title-tag' );

	/*
	 * Enable support for Post Thumbnails on posts and pages.
	 *
	 * See: https://codex.wordpress.org/Function_Reference/add_theme_support#Post_Thumbnails
	 */
	add_theme_support( 'post-thumbnails' );

	// This theme uses wp_nav_menu() in two locations.
	// register_nav_menus( array(
	// 	'primary' => __( 'Primary Menu',      'twentyfifteen' ),
	// 	'social'  => __( 'Social Links Menu', 'twentyfifteen' ),
	// ) );

	/*
	 * Switch default core markup for search form, comment form, and comments
	 * to output valid HTML5.
	 */
	add_theme_support( 'html5', array(
		'search-form', 'comment-form', 'comment-list', 'gallery', 'caption'
	) );

	/*
	 * Enable support for Post Formats.
	 *
	 * See: https://codex.wordpress.org/Post_Formats
	 */
	add_theme_support( 'post-formats', array(
		'image', 'video', 'gallery', 'audio'
	) );

}
endif; // medico_setup
add_action( 'after_setup_theme', 'medico_setup' );


function medico_theme_scripts() {
	
	wp_enqueue_style( 'bootstrap', get_template_directory_uri() . '/assets/css/bootstrap.css', array(), '5.2.3', 'all' );
	wp_enqueue_style( 'swiper-bundle', get_template_directory_uri() . '/assets/css/swiper-bundle.css', array(), '8.2.2', 'all' );	
	wp_enqueue_style( 'font-awesome-pro', get_template_directory_uri() . '/assets/css/font-awesome-pro.css', array(), '8.2.2', 'all' );	
	wp_enqueue_style( 'swiper', get_template_directory_uri() . '/assets/css/swiper/swiper-bundle.min.css', array(), '8.2.2', 'all' );	
	wp_enqueue_style( 'aos', get_template_directory_uri() . '/assets/vendor/aos/aos.css', array(), '8.2.2', 'all' );	
	wp_enqueue_style( 'medico-main', get_template_directory_uri() . '/assets/css/main.css', array(), '8.2.2', 'all' );
	wp_enqueue_style( 'style', get_stylesheet_uri() );


	wp_enqueue_script( 'bootstrap', get_template_directory_uri() . '/assets/js/bootstrap-bundle.js', array( 'jquery' ), '5.1.3', true );
	wp_enqueue_script( 'purecounter', get_template_directory_uri() . '/assets/js/purecounter.js', array( ), '5.1.3', true );
	wp_enqueue_script( 'swiper-bundle', get_template_directory_uri() . 'assets/js/swiper-bundle.js', array( ), '5.1.3', true );
	wp_enqueue_script( 'aos1', get_template_directory_uri() . 'assets/vendor/aos/aos.cjs.js', array( ), '5.1.3', true );
	wp_enqueue_script( 'aos2', get_template_directory_uri() . 'assets/vendor/aos/aos.esm.js', array( ), '5.1.3', true );
	wp_enqueue_script( 'aos3', get_template_directory_uri() . 'assets/vendor/aos/aos.js', array( ), '5.1.3', true );
	wp_enqueue_script( 'aos3', get_template_directory_uri() . 'assets/vendor/aos/aos.js.map', array( ), '5.1.3', true );
	
	
	
	wp_enqueue_script( 'medico-main', get_template_directory_uri() . '/assets/js/main.js', array( ), '1.0.0', true );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'medico_theme_scripts' );