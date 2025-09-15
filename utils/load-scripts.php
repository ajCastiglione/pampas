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
	wp_enqueue_style( 'google-fonts', 'https://fonts.googleapis.com/css2?family=Inter:ital,opsz,wght@0,14..32,100..900;1,14..32,100..900&family=Staatliches&display=swap', array(), '1.0.0', 'all' );
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

/**
 * Enqueue scripts and styles for ACF Map block.
 */
function mwd_register_acf_map_block() {
	wp_register_script(
		'google-maps-api',
		'https://maps.googleapis.com/maps/api/js?key=' . esc_attr( get_field( 'google_maps_api_key', 'option' ) ) . '&callback=Function.prototype',
		array( 'jquery' ),
		'0.4.24',
		true
	);
	wp_register_script(
		'acf-map-block-js',
		get_stylesheet_directory_uri() . '/library/js/maps/Map.js',
		array( 'google-maps-api', 'jquery' ),
		'0.4.24',
		true
	);

	wp_localize_script(
		'acf-map-block-js',
		'map_vars',
		array(
			'styles' => file_get_contents( get_stylesheet_directory() . '/library/maps/pampas-map.json' ),
		)
	);
}
add_action( 'wp_enqueue_scripts', 'mwd_register_acf_map_block' );
