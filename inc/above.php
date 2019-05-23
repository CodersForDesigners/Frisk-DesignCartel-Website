<?php

// Get utility functions
require_once __DIR__ . '/utils.php';
// Include WordPress for Content Management
initWordPress();

/* -- Lazaro disclaimer and footer -- */
require_once __DIR__ . '/lazaro.php';

/*
 * A version number for versioning assets to invalidate the browser cache
 */
$ver = '?v=20190509';

/*
 * Get all the links on the site
 */
$defaultLinks = require __DIR__ . '/default-nav-links.php';
$links = getContent( $defaultLinks, 'pages' );

/*
 * Figure out the base URL
 */
$urlPath = strstr( $_SERVER[ 'REQUEST_URI' ], '?', true );
// $urlFragments = preg_split( '/\//', $urlPath );
// 	// Pull out the first non-empty fragment
// $calculatedBaseSlug = '';
// $inferredBaseSlug = $_GET[ '_slug' ] ?? '';
// foreach ( $urlFragments as $fragment ) {
// 	if ( ! empty( $fragment ) ) {
// 		$calculatedBaseSlug = $fragment;
// 		break;
// 	}
// }
// if ( $inferredBaseSlug == $calculatedBaseSlug )
// 	$baseURL = null;
// else
// 	$baseURL = '/' . $calculatedBaseSlug . '/';
$baseURL = '/';

/*
 * Get the title and URL of the website and current page
 */
$siteTitle = getContent( 'Design Cartel', 'site_title' );
$pageUrl = $siteUrl . $urlPath;
if ( pageIsStatic() )
	$pageTitle = getCurrentPageTitle( $links, $baseURL, $siteTitle );
else {
	$the_post = getCurrentPost();
	if ( empty( $the_post ) ) {
		http_response_code( 404 );
		exit;
	}
	$pageTitle = $the_post->post_title . ' | ' . $siteTitle;
}
http_response_code( 200 );

?>

<!DOCTYPE html>
<html lang="en" xmlns="http://www.w3.org/1999/xhtml"
	prefix="og: http://ogp.me/ns# fb: http://www.facebook.com/2008/fbml">

	<?php require_once 'head.php'; ?>

	<body id="body" class="body">

		<?php
			/*
			 * Arbitrary Code ( Top of Body )
			 */
			echo getContent( '', 'arbitrary_code_body_top' );
		?>

	<!--  ★  MARKUP GOES HERE  ★  -->

	<div id="page-wrapper"><!-- Page Wrapper -->

		<?php //require_once 'navigation.php'; ?>

		<!-- Page Content -->
		<div id="page-content">

			<?php
			/* -- Design Cartel Header -- */
				require_once __DIR__ . '/dc-header.php';
			?>
