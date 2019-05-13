
$( function ( $ ) {





/*
 *
 * Store values for reference
 *
 */
	// DOM elements
var $elementsToReveal = Array.prototype.slice.call( $( ".js_scroll_reveal" ) )
						.map( function ( el ) {
							return $( el )
						} );
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

/*
 *
 * Smooth-scroll to sections
 *
 */
$( document ).on( "click", "a[ href ^= '/#' ]", function ( event ) {
	event.preventDefault();
	event.stopPropagation();
	event.stopImmediatePropagation();
	var $link = $( event.target ).closest( "a" );
	var toSectionId = $link.attr( "href" ).slice( 2 );
	// setTimeout( function () {
		var domSection = document.getElementById( toSectionId );
		window.scrollTo( { top: domSection.offsetTop - 50, behavior: "smooth" } );
	// }, 0 );
	// Hide the menu
	$navigationMenu.removeClass( "show" );
	return false;
} );



// Returns whether or not an element has **not** been "revealed",
//  	i.e. does not have the `reveal` class
function hasElementNotBeenRevealed ( $el ) {
	return ! $el.hasClass( "reveal" );
}

function layoutNavigation () {

	var viewportHeight = $( window ).height();
	currentScrollTop = window.scrollY || document.body.scrollTop;

	/*
	 * Reveal elements as they are scrolled to
	 */
	for ( let _i = 0; _i < $elementsToReveal.length; _i += 1 ) {
		if (
			$elementsToReveal[ _i ].offset().top
				<
			currentScrollTop + viewportHeight / 1.5
		)
			$elementsToReveal[ _i ].addClass( "reveal" );
	}
	$elementsToReveal = $elementsToReveal.filter( hasElementNotBeenRevealed );

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
