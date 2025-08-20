<?php
if ( ! function_exists( 'medico_setup' ) ) :
function medico_setup() {

	// Translation
	load_theme_textdomain( 'medico', get_template_directory() . '/languages' );

	// RSS feed links
	add_theme_support( 'automatic-feed-links' );

	// Let WordPress manage the document title
	add_theme_support( 'title-tag' );

	// Post thumbnails
	add_theme_support( 'post-thumbnails' );

	// HTML5 support
	add_theme_support( 'html5', array(
		'search-form', 'comment-form', 'comment-list', 'gallery', 'caption'
	) );

	// Post formats
	add_theme_support( 'post-formats', array(
		'image', 'video', 'gallery', 'audio'
	) );

}
endif;
add_action( 'after_setup_theme', 'medico_setup' );


function medico_theme_scripts() {

	// ----------------- CSS -----------------
	wp_enqueue_style( 'bootstrap', get_template_directory_uri() . '/assets/css/bootstrap.css', array(), '5.2.3' );
	wp_enqueue_style( 'swiper', get_template_directory_uri() . '/assets/css/swiper/swiper-bundle.min.css', array(), '8.2.2' );	
	wp_enqueue_style( 'font-awesome-pro', get_template_directory_uri() . '/assets/css/font-awesome-pro.css', array(), '8.2.2' );	
	wp_enqueue_style( 'aos', get_template_directory_uri() . '/assets/vendor/aos/aos.css', array(), '3.4.0' );
	wp_enqueue_style( 'glightbox', get_template_directory_uri() . '/assets/vendor/glightbox/css/glightbox.min.css', array(), '3.2.0' );	
	wp_enqueue_style( 'medico-main', get_template_directory_uri() . '/assets/css/main.css', array(), '1.0.0' );
	wp_enqueue_style( 'style', get_stylesheet_uri() );

	// ----------------- JS -----------------
	wp_enqueue_script( 'bootstrap', get_template_directory_uri() . '/assets/js/bootstrap-bundle.js', array( 'jquery' ), '5.2.3', true );
	wp_enqueue_script( 'purecounter', get_template_directory_uri() . '/assets/js/purecounter.js', array(), '1.5.0', true );
	wp_enqueue_script( 'swiper', get_template_directory_uri() . '/assets/js/swiper-bundle.js', array(), '8.2.2', true );
	wp_enqueue_script( 'aos', get_template_directory_uri() . '/assets/vendor/aos/aos.js', array(), '3.4.0', true );
	wp_enqueue_script( 'glightbox', get_template_directory_uri() . '/assets/vendor/glightbox/js/glightbox.min.js', array(), '3.2.0', true );

	// main.js depends on AOS and Swiper
	wp_enqueue_script( 'medico-main', get_template_directory_uri() . '/assets/js/main.js', array( 'aos', 'swiper' ), '1.0.0', true );

	// Comment reply
	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'medico_theme_scripts' );
