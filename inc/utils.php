<?php





/*
 *
 * Pull in the WordPress files if possible
 *
 */
function initWordPress () {
	$configFile = __DIR__ . '/../cms/wp-config.php';
	$configFile__AlternateLocation = __DIR__ . '/../wp-config.php';
	if ( file_exists( $configFile ) || file_exists( $configFile__AlternateLocation ) ) {
		$includeStatus = include_once __DIR__ . '/../cms/index.php';
		if ( $includeStatus )
			setupVars();
	}
}


/*
 *
 * Set up global variables
 *
 */
$pageId = null;
$siteUrl = ( isOnHTTPS() ? 'https://' : 'http://' ) . $_SERVER[ 'HTTP_HOST' ];
function setupVars () {
	global $pageId;
	global $siteUrl;
	$pageId = get_the_ID();
	// $siteUrl = preg_replace( '/\/[^\/.]*$/', '', site_url() );
}


/*
 *
 * Pull custom content from ACF fields from WordPress
 *
 */
function getContent ( $fallback, $field, $context = null ) {

	if ( ! function_exists( 'get_field' ) )
		return $fallback;

	if ( empty( $context ) )
		$context = 'options';
	else if ( is_string( $context ) ) {
		$page = get_page_by_path( $context );
		if ( empty( $page ) or empty( $page->ID ) )
			$context = 'options';
		else
			$context = $page->ID;
	}

	$fieldParts = preg_split( '/\s*->\s*/' , $field );
	$content = get_field( $fieldParts[ 0 ], $context );
	if ( count( $fieldParts ) > 1 ) {
		$content = get_field( $fieldParts[ 0 ], $context );
		$remainderFieldParts = array_slice( $fieldParts, 1 );
		foreach ( $remainderFieldParts as $namespace )
			$content = $content[ $namespace ];
	}

	if ( empty( $content ) )
		return $fallback;
	else
		return $content;

}


/*
 *
 * Attempts to determine if the site is running on HTTPS.
 *  Borrowed code from the WordPress's `is_ssl` function.
 *
 */
function isOnHTTPS () {

	if ( isset( $_SERVER[ 'HTTPS' ] ) ) {
		if ( strtolower( $_SERVER['HTTPS'] ) == 'on' )
			return true;
		if ( $_SERVER[ 'HTTPS' ] == '1' )
			return true;
	}

	if ( isset( $_SERVER[ 'SERVER_PORT' ] ) )
		if ( $_SERVER[ 'SERVER_PORT' ] == '443' )
			return true;

	if ( isset( $_SERVER[ 'REQUEST_SCHEME' ] ) )
		if ( $_SERVER[ 'REQUEST_SCHEME' ] == 'https' )
			return true;

	return false;

}


/*
 *
 * Figure out if the page being requested has a corresponding template or not
 *
 */
function pageIsStatic () {
	return empty( $_GET[ '_post_type' ] );
}



/*
 *
 * Get the current post that the url is refering to
 *
 */
function getCurrentPost () {
	$post = get_posts( [
		'post_type' => $_GET[ '_post_type' ],
		'name' => $_GET[ '_slug' ],
		'post_status' => 'publish',
		'numberposts' => 1,
		'posts_per_page' => 1
	] );
	if ( ! empty( $post ) )
		return $post[ 0 ];
	else
		return null;
}



/*
 *
 * Get the title of the current page
 *
 */
function getCurrentPageTitle ( $siteLinks, $baseURL, $siteTitle ) {

	$currentPageSlug = $_SERVER[ 'REQUEST_URI' ];
	if ( strlen( $currentPageSlug ) <= 1 )
		$currentPageSlug = '/';

	$partialPageTitle = 'Untitled';
	foreach ( $siteLinks as $link ) {
		$fullSlug = preg_replace( '/\/+/', '/', $baseURL . $link[ 'slug' ] );
		if ( $currentPageSlug == $fullSlug ) {
			$partialPageTitle = $link[ 'title' ];
			break;
		}
	}
	if ( $partialPageTitle == 'Untitled' and $currentPageSlug == '/' )
		$pageTitle = $siteTitle;
	else
		$pageTitle = $partialPageTitle . ' | ' . $siteTitle;

	return $pageTitle;

}
