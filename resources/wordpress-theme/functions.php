<?php
/**
 * Brownie Fudge Sundae functions and definitions
 *
 * @package Brownie Fudge Sundae
 * @since 1.0.0
 */



/**
 * Global Settings Pages
 */
require get_template_directory() . '/inc/settings.php';

add_action( 'after_setup_theme', function () {

	/*
	 *
	 * Media Settings
	 *
	 */
	add_image_size( 'small', 400, 400, false );

} );
