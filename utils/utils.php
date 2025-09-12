<?php
/**
 * Helper functions
 *
 * @package    Utils
 */

/**
 * Check if on localhost
 *
 * @return bool
 */
function is_localhost() {
	$remote_addr = isset( $_SERVER['REMOTE_ADDR'] ) ? sanitize_text_field( wp_unslash( $_SERVER['REMOTE_ADDR'] ) ) : '';
	$whitelist   = array( '127.0.0.1', '::1' );
	if ( in_array( $remote_addr, $whitelist, true ) ) {
		return true;
	}

	return false;
}

/**
 * Dynamic file pathing based on local or production.
 *
 * @return string
 */
function get_dynamic_css_path() {
	if ( is_localhost() ) {
		return 'http://localhost:5173/library/css';
	}
	return get_stylesheet_directory_uri() . '/dist';
}

/**
 * Add type="module" to script tag
 * phpcs:disable WordPress.WP.EnqueuedResources.NonEnqueuedScript
 *
 * @param string $tag The <script> tag for the enqueued script.
 * @param string $handle The script's registered handle.
 * @param string $src The script's source URL.
 * @return string
 */
function add_type_attribute( $tag, $handle, $src ) {
	// Array of handles of the enqueued scripts we want to defer.
	$scripts_to_defer = array( 'index-scripts' );

	// if it isn't your script, do nothing and return original $tag.
	if ( ! in_array( $handle, $scripts_to_defer, true ) ) {
		return $tag;
	}

	// change the script tag by adding type="module" and return it.
	$tag = '<script type="module" src="' . esc_url( $src ) . '"></script>';
	return $tag;
}
add_filter( 'script_loader_tag', 'add_type_attribute', 10, 3 );

/**
 * Pagination.
 *
 * @param WP_Query $query The WP_Query object.
 * @return void
 */
function mwd_pagination( $query ) {
	if ( ! $query->max_num_pages || $query->max_num_pages < 2 ) {
		return;
	}
	$big             = 999999999; // An unlikely integer.
	$pagination_args = array(
		'base'      => str_replace( $big, '%#%', esc_url( get_pagenum_link( $big ) ) ),
		'format'    => get_option( 'permalink_structure' ) ? 'page/%#%/' : '&paged=%#%',
		'current'   => max( 1, get_query_var( 'paged' ) ),
		'total'     => $query->max_num_pages,
		'mid_size'  => 2,
		'type'      => 'list',
		'prev_text' => __( '&laquo; Previous', 'textdomain' ),
		'next_text' => __( 'Next &raquo;', 'textdomain' ),
	);
	echo wp_kses_post( paginate_links( $pagination_args ) );
}

/**
 * Kses to allow iframe
 *
 * @return string
 */
function wp_kses_svg() {
	$svg_args = array(
		'svg'     => array(
			'class'       => true,
			'aria-hidden' => true,
			'role'        => true,
			'xmlns'       => true,
			'width'       => true,
			'height'      => true,
			'style'       => true,
			'fill'        => true,
			'viewbox'     => true, // <= Must be lower case!
		),
		'mask'    => array(
			'id'     => true,
			'fill'   => true,
			'width'  => true,
			'height' => true,
		),
		'g'       => array(
			'fill'      => true,
			'transform' => true,
		),
		'title'   => array( 'title' => true ),
		'path'    => array(
			'd'               => true,
			'transform'       => true,
			'fill'            => true,
			'fill-rule'       => true,
			'clip-rule'       => true,
			'mask'            => true,
			'stroke'          => true,
			'stroke-width'    => true,
			'stroke-linejoin' => true,
			'stroke-linecap'  => true,
			'class'           => true,
		),
		'rect'    => array(
			'x'            => true,
			'y'            => true,
			'rx'           => true,
			'ry'           => true,
			'width'        => true,
			'height'       => true,
			'stroke'       => true,
			'stroke-width' => true,
			'transform'    => true,
			'fill'         => true,
			'opacity'      => true,
		),
		'defs'    => array(),
		'image'   => array(
			'id'         => true,
			'x'          => true,
			'y'          => true,
			'width'      => true,
			'height'     => true,
			'xlink'      => true,
			'xlink:href' => true,
		),
		'pattern' => array(
			'id'                  => true,
			'width'               => true,
			'height'              => true,
			'pattern'             => true,
			'patterncontentunits' => true,
			'transform'           => true,
		),
		'use'     => array(
			'xlink:href' => true,
			'transform'  => true,
		),
	);
	return $svg_args;
}

/**
 * Detect if Mobile device.
 *
 * @return bool
 */
function mwd_is_mobile() {
	if ( wp_is_mobile() ) {
		return true;
	}
	return false;
}

/**
 * Load SVG file contents.
 *
 * @param string $file Path to the SVG file.
 * @return string SVG file contents or empty string if file not found.
 */
function mwd_load_svg( $file ) {
	$file_path = get_stylesheet_directory() . $file;
	if ( file_exists( $file_path ) ) {
		return file_get_contents( $file_path ); // phpcs:ignore WordPress.WP.AlternativeFunctions.file_get_contents_file_get_contents
	}
	return '';
}
