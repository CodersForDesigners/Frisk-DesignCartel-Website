
$( document ).on( "click", ".js_tab", function ( event ) {

	// Prevent any default browser behavior on this element
	event.preventDefault();

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
