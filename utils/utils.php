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
