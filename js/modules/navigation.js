
$( function ( $ ) {





/*
 *
 * Store values for reference
 *
 */
	// DOM elements
var $navigationSection = $( ".js_navigation_section" );
var $navigationMenu = $navigationSection.find( ".js_navigation_menu" );
	// User Coordinates
var currentScrollTop;
var previousScrollTop;
var scrollThreshold = 10;



/*
 *
 * Navigation Menu Expand on Mobile
 *
 */
$( ".js_nav_toggle" ).on( "click", function ( event ) {
	$navigationMenu.toggleClass( "show" );
} );

function layoutNavigation () {

	currentScrollTop = window.scrollY || document.body.scrollTop;

	/*
	 * Roll-in/out the Navigation based on scroll direction
	 */
	if ( Math.abs( currentScrollTop - previousScrollTop ) < scrollThreshold ) {
		previousScrollTop = currentScrollTop;
		return;
	}

	// If scrolling ↓.....
	if ( currentScrollTop > previousScrollTop ) {
		$navigationSection.addClass( "hide" );
	}
	else {	// if scrolling ↑.....
		$navigationMenu.removeClass( "show" );
		$navigationSection.removeClass( "hide" );
	}

	previousScrollTop = currentScrollTop;

}

$( window ).on( "scroll", layoutNavigation );





} );
