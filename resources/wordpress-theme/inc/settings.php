<?php
/*
 *
 * This script sets up a global-level settings page.
 *
 */

if ( ! function_exists( 'acf_add_options_page' ) )
	return;

acf_add_options_page( [
	'page_title' => 'Site Meta and Content',
	'menu_title' => 'Site Meta and Content',
	'menu_slug' => 'site_meta_and_content',
	'capability' => 'edit_posts',
	'parent_slug' => '',
	'position' => false,
	'icon_url' => 'dashicons-info'
] );

acf_add_options_page( [
	'page_title' => 'Advanced Settings',
	'menu_title' => 'Advanced Settings',
	'menu_slug' => 'metadata',
	'capability' => 'edit_posts',
	'parent_slug' => '',
	'position' => false,
	'icon_url' => 'dashicons-info'
] );
