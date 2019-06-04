
/*
 * -----
 * On submitting the Customer form, create a customer
 * -----
 */
$( document ).on( "submit", ".js_enquiry_form", async function ( event ) {

	/* -----
	 * Prevent the default form submission behaviour
	 * 	which triggers the loading of a new page
	 ----- */
	event.preventDefault();

	var $form = $( event.target );
	var domForm = $form.get( 0 );
	var $formFieldsAndElements = $form.find( "input, textarea, select, button" );
	var $feedbackMessage = $form.find( ".js_feedback_message" );

	/* -----
	 * Disable the form
	 ----- */
	$formFieldsAndElements.prop( "disabled", true );
	$feedbackMessage.text( "" );

	/* -----
	 * Pull the data from the form
	 ----- */
		// Name
	var $name = $form.find( "[ name = 'name' ]" );
		// Phone number
	var $phoneNumber = $form.find( "[ name = 'phoneNumber' ]" );
		// Email
	var $email = $form.find( "[ name = 'email' ]" );
		// Location
	var $location = $form.find( "[ name = 'location' ]" );
		// Inquiry type
	var $inquiryType = $form.find( "[ name = 'inquiryType' ]" );
		// Company
	var $company = $form.find( "[ name = 'company' ]" );
		// Message
	var $message = $form.find( "[ name = 'message' ]" );

	/* -----
	 * Sanitize the data
	 ----- */
	// Name
	$name.val( $name.val().trim() );
	// Phone number
	$phoneNumber.val( $phoneNumber.val().replace( /[^\d\s()-+]/g, "" ) );
	// Email
	$email.val( $email.val().trim() );
	// Location
	$location.val( $location.val().trim() );
	// Company
	$company.val( $company.val().trim() );
	// Message
	$message.val( $message.val().trim() );


	/* -----
	 * Validate the data
	 ----- */
	// Clear all error messages / indicators from the last submission
	//  	( if there was one )
	$form.find( ".form-error" ).removeClass( "form-error" );

	// Name
	if ( ! $name.val() )
		$name.addClass( "form-error" );
	// Phone number
	if ( ! $phoneNumber.val().replace( /\D/g, "" ) )
		$phoneNumber.addClass( "form-error" );
	// Email
	if ( ! $email.val() || ( ! $email.val().includes( "@" ) ) )
		$email.addClass( "form-error" );
	// Location
	if ( ! $location.val() )
		$location.addClass( "form-error" );
	// Inquiry type
	if ( ! $inquiryType.val() )
		$inquiryType.addClass( "form-error" );

	// If the form has even one validation issue
	// do not proceed
	if ( $form.find( ".form-error" ).length ) {
		$formFieldsAndElements.prop( "disabled", false );
		$feedbackMessage.html( `
			Please fill in the fields marked <span style="color: #FB5959; font-weight: 900">red</span>.
		` );
		return;
	}
	$feedbackMessage.text( "Enquiring....." );

	/* -----
	 * Assemble the data
	 ----- */
	var information = { };
	information.name = $name.val();
	information.phoneNumber = $phoneNumber.val();
	information.email = $email.val();
	information.location = $location.val();
	information.inquiryType = $inquiryType.val();
	information.company = $company.val();
	information.message = $message.val();

	/* -----
	 * Make the enquiry
	 ----- */
	 makeEnquiry( information )
	 	.then( function () {
	 		$feedbackMessage.text( "Thank you! We’ll get back to you shortly." );
	 	} )
	 	.catch( function () {
	 		$feedbackMessage.text( "Something went wrong. Please try again later." );
	 	} )

} );



/*
 *
 * Handle error / exception response helper
 *
 */
function getErrorResponse ( jqXHR, textStatus, e ) {
	var statusCode = -1;
	var message;
	if ( jqXHR.responseJSON ) {
		code = jqXHR.responseJSON.statusCode;
		message = jqXHR.responseJSON.statusMessage;
	}
	else if ( typeof e == "object" ) {
		message = e.stack;
	}
	else {
		message = jqXHR.responseText;
	}
	return {
		code,
		message
	};
}



/*
 *
 * Make an enquiry
 *
 */
function makeEnquiry ( information ) {

	// Build the payload
	var requestPayload = information;

	var url = location.origin + "/server/enquiries.php";
	var ajaxRequest = $.ajax( {
		url: url,
		method: "POST",
		data: requestPayload
	} );

	return new Promise( function ( resolve, reject ) {

		ajaxRequest.done( function ( response ) {
			resolve( response );
		} );

		ajaxRequest.fail( function ( jqXHR, textStatus, e ) {
			var errorResponse = getErrorResponse( jqXHR, textStatus, e );
			reject( errorResponse );
		} );

	} );

}
