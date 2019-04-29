<?php
/**
 * The main template file
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 *
 * @package Brownie Fudge Sundae
 * @since 1.0.0
 */

function stringEndsWith ( $string, $key ) {
	return strrpos( $string, $key ) !== false;
}

# A convenient redirect to the login page
$requestURI = $_SERVER[ 'REQUEST_URI' ];
if ( stringEndsWith( $requestURI, '/cms/' ) )
	header( 'Location: ' . $requestURI . 'wp-login.php' );
