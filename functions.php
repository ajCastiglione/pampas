<?php
/**
 * Main functions template
 *
 * @package Minerva Web Development
 */

/**
 * Load the utility files.
 */
require_once get_stylesheet_directory() . '/utils/utils.php';
require_once get_stylesheet_directory() . '/utils/load-scripts.php';
require_once get_stylesheet_directory() . '/theme/editor.php';


/**
 * Theme setup and custom theme supports.
 */
function theme_init() {
	// Allow editor style.
	add_editor_style( get_stylesheet_directory_uri() . '/library/css/editor-style.css' );

	// Adding title support.
	add_filter(
		'wp_title',
		function ( $title, $sep, $seplocation ) {
			// Add the site's name.
			if ( 'right' === $seplocation ) {
				$title .= get_bloginfo( 'name' );
			} else {
				$title = get_bloginfo( 'name' ) . $title;
			}

			// Add the blog description for the home/front page.
			$site_description = get_bloginfo( 'description', 'display' );

			if ( $site_description && ( is_home() || is_front_page() ) ) {
				$title .= " {$sep} {$site_description}";
			}

			return $title;
		},
		10,
		3
	);

	// Adding full-width blocks in editor support.
	add_theme_support( 'align-wide' );
	add_theme_support( 'post-thumbnails' );
	// Removing bloat for emojis and such.
	remove_action( 'wp_head', 'print_emoji_detection_script', 7 );
	remove_action( 'admin_print_scripts', 'print_emoji_detection_script' );
	remove_action( 'wp_print_styles', 'print_emoji_styles' );
	remove_action( 'admin_print_styles', 'print_emoji_styles' );
} /* end theme init */

// Initialize theme.
add_action( 'after_setup_theme', 'theme_init' );

/**
 * Register navigation menus.
 */
require get_stylesheet_directory() . '/theme/nav-menus.php';

/**
 * Load ACF configurations.
 */
if ( class_exists( 'ACF' ) ) {
	require get_stylesheet_directory() . '/theme/acf.php';
}

/**
 * Load custom post types.
 */
require get_stylesheet_directory() . '/theme/post-types.php';
