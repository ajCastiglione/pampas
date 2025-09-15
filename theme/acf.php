<?php
/**
 * ACF Configurations.
 *
 * @package Minerva Web Development
 */

/**
 * ACF JSON Save Point.
 *
 * @param string $path content.
 * @return string
 */
function mwd_acf_json_save_point( $path ) {
	// update path.
	$path = get_stylesheet_directory() . '/library/acf-json';

	// return.
	return $path;
}
add_filter( 'acf/settings/save_json', 'mwd_acf_json_save_point' );

/**
 * ACF JSON Load Point.
 *
 * @param string $paths content.
 * @return string
 */
function mwd_acf_json_load_point( $paths ) {
	// remove original path.
	unset( $paths[0] );

	// append path.
	$paths[] = get_stylesheet_directory() . '/library/acf-json';

	// return.
	return $paths;
}
add_filter( 'acf/settings/load_json', 'mwd_acf_json_load_point' );

/**
 * Options Pages and block registry.
 *
 * @since 1.0.0
 *
 * @return void
 */
function mwd_acf_option_init() {
	// Check function exists.
	if ( function_exists( 'acf_add_options_sub_page' ) ) {
		// Add options page for BR.
		acf_add_options_page(
			array(
				'page_title' => 'Options Page',
				'menu_title' => 'Options Page',
				'menu_slug'  => 'theme-options',
				'capability' => 'edit_posts',
				'redirect'   => false,
				'position'   => 2,
			)
		);
	}
	// Add blocks.
	if ( function_exists( 'acf_register_block_type' ) ) {
		acf_register_block_type(
			array(
				'name'            => 'hero',
				'title'           => __( 'Hero' ),
				'description'     => __( 'Hero block containing a background image and text overlay' ),
				'render_callback' => 'render_callback',
				'category'        => 'layout',
				'icon'            => 'superhero-alt',
				'mode'            => 'edit',
				'align'           => 'wide',
				'keywords'        => array( 'hero', 'background', 'overlay' ),
				'supports'        => array(
					'multiple' => false,
				),
				'enqueue_assets'  => function() {
					wp_enqueue_style( 'mwd-hero-block', get_dynamic_css_path() . '/blocks/hero.css', array(), '1.0.0', 'all' );
				},
			)
		);
		acf_register_block_type(
			array(
				'name'            => 'content-media',
				'title'           => __( 'Content & Media' ),
				'description'     => __( 'Displays a title, media, and content section with a choice of background color' ),
				'render_callback' => 'render_callback',
				'category'        => 'layout',
				'icon'            => 'media-document',
				'align'           => 'wide',
				'keywords'        => array( 'content', 'media' ),
				'mode'            => 'edit',
			)
		);
		acf_register_block_type(
			array(
				'name'            => 'content',
				'title'           => __( 'Content' ),
				'description'     => __( 'Content block with a choice of background color' ),
				'render_callback' => 'render_callback',
				'category'        => 'layout',
				'icon'            => 'media-text',
				'align'           => 'wide',
				'keywords'        => array( 'content' ),
				'mode'            => 'edit',
			)
		);
		acf_register_block_type(
			array(
				'name'            => 'testimonials',
				'title'           => __( 'Testimonials Slider' ),
				'description'     => __( 'Slider block for displaying testimonials.' ),
				'render_callback' => 'render_callback',
				'category'        => 'layout',
				'icon'            => 'slides',
				'align'           => 'wide',
				'keywords'        => array( 'testimonials' ),
				'mode'            => 'edit',
			)
		);
		acf_register_block_type(
			array(
				'name'            => 'contact',
				'title'           => __( 'Contact Form' ),
				'description'     => __( 'Block for displaying a contact form.' ),
				'render_callback' => 'render_callback',
				'category'        => 'layout',
				'icon'            => 'external',
				'align'           => 'wide',
				'keywords'        => array( 'contact' ),
				'mode'            => 'edit',
			)
		);
	}
}
add_action( 'acf/init', 'mwd_acf_option_init' );

/**
 * ACF Render Callback.
 *
 * @param array $block content.
 * @return void
 */
function render_callback( $block ) {
	// Name has to be equal to the file name after content.
	$slug = str_replace( 'acf/', '', $block['name'] );

	// include a template part from within the "template-parts/blocks" folder.
	$path = get_stylesheet_directory() . "/blocks/{$slug}.php";
	if ( file_exists( $path ) ) {
		require $path;
	}
}

/**
 * Prepopulate the ACF contact block 'form' field with Gravity Form IDs.
 *
 * @param array $field The ACF field array.
 * @return array The modified ACF field array.
 */
function populate_gravity_forms( $field ) {
	// Reset choices.
	$field['choices'] = array();

	// Get all Gravity Forms.
	$forms = GFAPI::get_forms();

	// Loop through each form and add it to the choices.
	if ( ! empty( $forms ) ) {
		foreach ( $forms as $form ) {
			$field['choices'][ $form['id'] ] = $form['title'];
		}
	}

	return $field;
}
add_filter( 'acf/load_field/name=form_id', 'populate_gravity_forms' );

/**
 * Add Google Maps API key to ACF Google Map field.
 *
 * @param array $api The API settings array.
 * @return array The modified API settings array.
 */
function add_google_maps_api_key( $api ) {
	$api['key'] = get_field( 'google_maps_api_key', 'option' );
	return $api;
}
add_filter( 'acf/fields/google_map/api', 'add_google_maps_api_key' );
