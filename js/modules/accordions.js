
// window.__DC = window.__DC || { };

$( document ).on( "click", ".js_accordion", function ( event ) {

	// Prevent any default browser behavior on this element
	event.preventDefault();

	// Disable the auto-advancement of accordions ( if it's already happening )
	// window.cancelAnimationFrame( advancingAccordion__afId );
	// window.__DC.UI.accordionShouldAutoAdvance = false;

	// Hold references to things that we'll to refer to frequently
	var $accordion = $( event.target ).closest( ".js_accordion" );
	var $accordionContainer = $accordion.closest( ".js_accordion_container" );

	/*
	 * De-select the currently selected accordion
	 */
	$accordionContainer.find( ".js_accordion.show" ).removeClass( "show" );

	/*
	 * Select the accordion that was clicked on
	 */
	$accordion.addClass( "show" );

} );

// window.__DC.UI = {
// 	accordionShouldAutoAdvance: true
// }
// window.requestAnimationFrame( autoAdvanceAccordion );
// function autoAdvanceAccordion () {

// 	var $accordionContainers = $( ".js_accordion_region" );
// 	$accordionContainers.each( function ( _i, domAccordionContainer ) {

// 		var $accordionContainer = $( domAccordionContainer );
// 		var viewportHeight = $( window ).height();
// 		var currentScrollTop = window.scrollY || document.body.scrollTop;
// 		var accordionTop = $accordionContainer.offset().top;
// 		var accordionHeight = $accordionContainer.outerHeight();

// 		if (
// 			accordionTop < currentScrollTop
// 				||
// 			currentScrollTop + viewportHeight	// bottom of viewport
// 					// bottom of accordion plus buffer
// 				> accordionTop + accordionHeight + 100
// 		) {
// 			return;
// 		}

// 		// Get the current and next accordions
// 		var $accordion = $accordionContainer.find( ".js_accordion" );
// 		var $currentAccordion = $accordion.filter( ".show" );
// 		var $nextAccordion = $currentAccordion.next();
// 		if ( ! $nextAccordion.length )
// 			$nextAccordion = $accordion.first();

// 		// Select the new accordion
// 		$currentAccordion.removeClass( "show" );
// 		$nextAccordion.addClass( "show" );

// 	} );

// 	waitFor( 3 )
// 		.then( function () {
// 			if ( window.__DC.UI.accordionShouldAutoAdvance )
// 				window.requestAnimationFrame( autoAdvanceAccordion );
// 		} );

// }
