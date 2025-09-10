<?php
/**
 * TinyMCE editor addtions
 *
 * @package mwd
 */

/**
 * Add style selector to the beginning of the toolbar
 *
 * @param  array $buttons - TinyMCE buttons.
 * @return array
 */
function mwd_tinymce_buttons( $buttons ) {
	array_unshift( $buttons, 'styleselect' );
	return $buttons;
}
add_filter( 'mce_buttons_2', 'mwd_tinymce_buttons' );

/**
 * Callback function to filter the MCE settings
 *
 * @param array $init_array - MCE settings.
 * @return array
 */
function mwd_mce_before_init_insert_formats( $init_array ) {

	// Remove the preview styles.
	unset( $init_array['preview_styles'] );

	// Define the style_formats array.
	$style_formats = array(
		// Each array child is a format with it's own settings.
		array(
			'title' => 'Buttons',
			'items' => array(
				array(
					'title'    => 'Button',
					'selector' => 'a',
					'classes'  => 'btn',
				),
			),
		),
	);

	// Insert the array, JSON ENCODED, into 'style_formats'.
	$init_array['style_formats'] = wp_json_encode( $style_formats );

	return $init_array;
}
// Attach callback to 'tiny_mce_before_init'.
add_filter( 'tiny_mce_before_init', 'mwd_mce_before_init_insert_formats', 10, 1 );
