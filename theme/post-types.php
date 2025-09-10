<?php
/**
 * Register Custom Post Types and Taxonomies.
 *
 * @package Minerva Web Development
 */

// Exit if accessed directly.
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * Register Custom Post Type: Testimonial.
 */
function mwd_register_testimonial_post_type() {
	$labels = array(
		'name'                  => _x( 'Testimonials', 'Post Type General Name', 'mwd' ),
		'singular_name'         => _x( 'Testimonial', 'Post Type Singular Name', 'mwd' ),
		'menu_name'             => __( 'Testimonials', 'mwd' ),
		'name_admin_bar'        => __( 'Testimonial', 'mwd' ),
		'archives'              => __( 'Testimonial Archives', 'mwd' ),
		'attributes'            => __( 'Testimonial Attributes', 'mwd' ),
		'parent_item_colon'     => __( 'Parent Testimonial:', 'mwd' ),
		'all_items'             => __( 'All Testimonials', 'mwd' ),
		'add_new_item'          => __( 'Add New Testimonial', 'mwd' ),
		'add_new'               => __( 'Add New', 'mwd' ),
		'new_item'              => __( 'New Testimonial', 'mwd' ),
		'edit_item'             => __( 'Edit Testimonial', 'mwd' ),
		'update_item'           => __( 'Update Testimonial', 'mwd' ),
		'view_item'             => __( 'View Testimonial', 'mwd' ),
		'view_items'            => __( 'View Testimonials', 'mwd' ),
		'search_items'          => __( 'Search Testimonials', 'mwd' ),
		'not_found'             => __( 'Not found', 'mwd' ),
		'not_found_in_trash'    => __( 'Not found in Trash', 'mwd' ),
		'featured_image'        => __( 'Featured Image', 'mwd' ),
		'set_featured_image'    => __( 'Set featured image', 'mwd' ),
		'remove_featured_image' => __( 'Remove featured image', 'mwd' ),
		'use_featured_image'    => __( 'Use as featured image', 'mwd' ),
		'insert_into_item'      => __( 'Insert into testimonial', 'mwd' ),
		'uploaded_to_this_item' => __( 'Uploaded to this testimonial', 'mwd' ),
		'items_list'            => __( 'Testimonials list', 'mwd' ),
		'items_list_navigation' => __( 'Testimonials list navigation', 'mwd' ),
		'filter_items_list'     => __( 'Filter testimonials list', 'mwd' ),
	);
	// Register the post type.
	register_post_type(
		'testimonial',
		array(
			'labels'             => $labels,
			'description'        => __( 'Testimonials', 'mwd' ),
			'public'             => false,
			'publicly_queryable' => true,
			'show_in_rest'       => true,
			'show_ui'            => true,
			'rest_base'          => 'testimonials',
			'menu_icon'          => 'dashicons-format-quote',
			'supports'           => array( 'title' ),
			'has_archive'        => false,
			'rewrite'            => false,
		)
	);
}
add_action( 'init', 'mwd_register_testimonial_post_type' );
