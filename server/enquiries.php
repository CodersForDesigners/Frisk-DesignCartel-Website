<?php

/*
 *
 * -/-/-/-/-/-/-/-/-/-/-/-/-/-/-/-/-/-/-/-/-/
 * SCRIPT SETUP
 * /-/-/-/-/-/-/-/-/-/-/-/-/-/-/-/-/-/-/-/-/-
 *
 */
ini_set( 'display_errors', 1 );
ini_set( 'error_reporting', E_ALL );

// Set the timezone
date_default_timezone_set( 'Asia/Kolkata' );

// Do not let this script timeout
set_time_limit( 0 );

// Continue processing this script even if the user closes the tab, or
//  	hits the ESC key
ignore_user_abort( true );

// Allow this script to triggered from another origin
// header( 'Access-Control-Allow-Origin: *' );

// Remove / modify certain headers of the response
header_remove( 'X-Powered-By' );
header( 'Content-Type: application/json' );	// JSON format

$input = &$_POST;





/*
 *
 * -/-/-/-/-/-/-/-/-/-/-/-/-/-/-/-/-/-/-/-/-/
 * SCRIPT DEPENDENCIES
 * /-/-/-/-/-/-/-/-/-/-/-/-/-/-/-/-/-/-/-/-/-
 *
 */
require __DIR__ . '/mailer.php';





/*
 *
 * Preliminary input sanitization
 *
 */
foreach ( $input as $key => &$value ) {
	$value = trim( $value );
}

/*
 *
 * Check if the required inputs are **present**
 *
 */
if ( empty( $input[ 'name' ] ) ) {
	$response[ 'statusCode' ] = 4001;
	$response[ 'message' ] = 'Please provide a name.';
	http_response_code( 400 );
	die( json_encode( $response ) );
}
if ( empty( $input[ 'location' ] ) ) {
	$response[ 'statusCode' ] = 4002;
	$response[ 'message' ] = 'Please provide a location.';
	http_response_code( 400 );
	die( json_encode( $response ) );
}
if ( empty( $input[ 'phoneNumber' ] ) ) {
	$response[ 'statusCode' ] = 4003;
	$response[ 'message' ] = 'Please provide a phone number.';
	http_response_code( 400 );
	die( json_encode( $response ) );
}
if ( empty( $input[ 'email' ] ) ) {
	$response[ 'statusCode' ] = 4004;
	$response[ 'message' ] = 'Please provide an email address.';
	http_response_code( 400 );
	die( json_encode( $response ) );
}
if ( empty( $input[ 'inquiryType' ] ) ) {
	$response[ 'statusCode' ] = 4005;
	$response[ 'message' ] = 'Please provide an inquiry type.';
	http_response_code( 400 );
	die( json_encode( $response ) );
}




/*
 *
 * Check if the input field values are **valid**
 *
 */
// Phone number
if ( ! preg_match( '/^\+?\d+$/', $input[ 'phoneNumber' ] ) ) {
	$response[ 'statusCode' ] = 4004;
	$response[ 'message' ] = 'Please provide a valid phone number.';
	http_response_code( 400 );
	die( json_encode( $response ) );
}

// Email address
if ( ! empty( $input[ 'email' ] ) ) {
	if ( strpos( $input[ 'email' ], '@' ) !== false )
		$customer[ 'email' ] = $input[ 'email' ];
	else {
		$response[ 'statusCode' ] = 4006;
		$response[ 'message' ] = 'Please provide a valid email address.';
		http_response_code( 400 );
		die( json_encode( $response ) );
	}
}



/*
 *
 * Prepare the mail
 *
 */
$subject = 'Enquiry from ' . $input[ 'name' ];
$message = <<<EOT
Name: ${input[ 'name' ]}
<br>
Phone number: ${input[ 'phoneNumber' ]}
<br>
Email: ${input[ 'email' ]}
<br>
Location: ${input[ 'location' ]}
<br>
Inquiry: ${input[ 'inquiryType' ]}
<br>
Company: ${input[ 'company' ]}
<br>
Message: ${input[ 'message' ]}
EOT;



/*
 *
 * Send the mail
 *
 */
try {
	$status = Mailer\send( 'kaushik@designcartel.in', $subject, $message, [ 'ck@designcartel.in' ] );
	$response[ 'statusCode' ] = 0;
	$response[ 'message' ] = 'Enquiry made.';
}
catch ( \Exception $e ) {

	// Respond with an error
	if ( $e->getCode() > 5000 )
		$response[ 'statusCode' ] = $e->getCode();
	else
		$response[ 'statusCode' ] = -1;

	$response[ 'message' ] = $e->getMessage();
	http_response_code( 500 );

}
// Finally, respond back to the client
die( json_encode( $response ) );
