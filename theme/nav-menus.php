<?php
/**
 * Registers nav menus here.
 *
 * @package Minerva Web Development
 */

register_nav_menus(
	array(
		'main-nav'   => __( 'The Main Menu', 'mwd' ),
		'side-nav'   => __( 'The Side Menu', 'mwd' ),
		'dining-nav' => __( 'The Dining Menu', 'mwd' ),
		'events-nav' => __( 'The Events Menu', 'mwd' ),
		'about-nav'  => __( 'The About Menu', 'mwd' ),
	)
);
