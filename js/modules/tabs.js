
$( document ).on( "click", ".js_tab", function ( event ) {

	// Prevent any default browser behavior on this element
	event.preventDefault();

	// Disable the auto-advancement of tabs ( if it's already happening )
	// window.cancelAnimationFrame( advancingAccordion__afId );
	tabsShouldAutoAdvance = false;

	// Hold references to things that we'll to refer to frequently
	var $tab = $( event.target ).closest( ".js_tab" );
	var $tabsContainer = $tab.closest( ".js_tabs_container" );

	/*
	 * De-select the currently selected tab
	 */
	$tabsContainer.find( ".js_tab.show" ).removeClass( "show" );

	/*
	 * Select the tab that was clicked on
	 */
	$tab.addClass( "show" );

} );

var tabsShouldAutoAdvance = true;
window.requestAnimationFrame( autoAdvanceAccordion );
function autoAdvanceAccordion () {

	var $tabContainers = $( ".js_tabs_container" );
	$tabContainers.each( function ( _i, domTabContainer ) {

		// Get the current and next tabs
		var $tabs = $( domTabContainer ).find( ".js_tab" );
		var $currentTab = $tabs.filter( ".show" );
		var $nextTab = $currentTab.next();
		if ( ! $nextTab.length )
			$nextTab = $tabs.first();

		// Select the new tab
		$currentTab.removeClass( "show" );
		$nextTab.addClass( "show" );

	} );

	waitFor( 3 )
		.then( function () {
			if ( tabsShouldAutoAdvance )
				window.requestAnimationFrame( autoAdvanceAccordion );
		} );

}
