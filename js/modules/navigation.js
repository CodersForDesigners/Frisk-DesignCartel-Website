
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

	var $link = $( event.target ).closest( "a" );
	// Extract the id of the section
	var toSectionId = $link.attr( "href" ).slice( 2 );
	// Get a reference to the DOM node representing the section
	var domSection = document.getElementById( toSectionId );
	// If the section don't exist, we don't want to prevent the default behavior
	if ( ! domSection )
		return;
	// It does exist, so now we do prevent the default behavior
	event.preventDefault();
	event.stopPropagation();
	event.stopImmediatePropagation();
	// Scroll to the section
	window.scrollTo( { top: domSection.offsetTop - 50, behavior: "smooth" } );
	// Hide the menu
	$navigationMenu.removeClass( "show" );

	// Just a fallback to ensure that the default behavior is prevented
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
			currentScrollTop + ( 0.95 * viewportHeight )
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
		if ( currentScrollTop > viewportHeight / 2 )
			$navigationSection.addClass( "hide" );
	}
	else {	// if scrolling ↑.....
		$navigationMenu.removeClass( "show" );
		$navigationSection.removeClass( "hide" );
	}

	previousScrollTop = currentScrollTop;

}

layoutNavigation();
$( window ).on( "scroll", layoutNavigation );





} );
