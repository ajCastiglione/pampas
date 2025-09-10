<?php
/**
 * Load scripts and styles
 *
 * @package    Utils
 */

/**
 * Enqueue scripts and styles
 *
 * @return void
 */
function load_scripts() {
	// Load development styles/scripts, if on localhost.
	if ( is_localhost() ) {
		wp_enqueue_script( 'index-scripts', 'http://localhost:5173/library/js/index.js', array( 'jquery' ), '1.0.0', true );
	} else {
		// Get modified file time.
		$script_version = filemtime( get_template_directory() . '/dist/index.js' );
		$style_version  = filemtime( get_template_directory() . '/dist/index.css' );
		wp_enqueue_script( 'index-scripts', get_template_directory_uri() . '/dist/index.js', array(), $script_version, true );
		wp_enqueue_style( 'index-styles', get_template_directory_uri() . '/dist/main.css', array(), $style_version );
	}

	// Load Adobe Fonts.
	wp_enqueue_style( 'adobe-fonts', 'https://use.typekit.net/sbi0nor.css', array(), '1.0.0', 'all' );
	// Load Google Fonts.
	wp_enqueue_style( 'google-fonts', 'https://fonts.googleapis.com/css2?family=Staatliches&display=swap', array(), '1.0.0', 'all' );
	// Load AOS libraries.
	wp_enqueue_style( 'aos-css', 'https://unpkg.com/aos@2.3.1/dist/aos.css', array(), '2.3.1', 'all' );
	wp_enqueue_script( 'aos-js', 'https://unpkg.com/aos@2.3.1/dist/aos.js', array( 'jquery' ), '2.3.1', true );
	// Load Font Awesome.
	wp_enqueue_style( 'font-awesome', 'https://cdnjs.cloudflare.com/ajax/libs/font-awesome/7.0.1/css/all.min.css', array(), '7.0.1', 'all' );
}
add_action( 'wp_enqueue_scripts', 'load_scripts' );

/**
 * Enqueue scripts and styles for slick slider.
 */
function mwd_register_slick_slider() {
	wp_register_script(
		'slick-slider-js',
		'https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.9.0/slick.min.js',
		array( 'jquery' ),
		'1.9.0',
		true
	);
	wp_register_style(
		'slick-slider-css',
		'https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.9.0/slick.min.css',
		array(),
		'1.9.0'
	);
	wp_register_style(
		'slick-slider-theme-css',
		'https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.9.0/slick-theme.css',
		array(),
		'1.9.0'
	);
}
add_action( 'wp_enqueue_scripts', 'mwd_register_slick_slider' );
