<?php

function Auth($authorization){
    // Split the authorization header into type and token
	list($type, $authorization) = explode(" ", $authorization);
	
	// Define your valid tokens
	$valid_tokens = array(
		'FREETOKEN',
		'TOKEN1',
		'TOKEN2',
	);
	
	// Check if the provided token is valid
	if(in_array($authorization, $valid_tokens)) return true;
	
	// If the token is not valid, return false
	return false;
}

// Retrieve the Authorization header from the request
$headers = apache_request_headers();
if (!isset($headers['Authorization'])) {
    http_response_code(401); // Unauthorized
    echo json_encode(array("message" => "No token provided."));
    exit();
}

// Call the Auth function to validate the token
if (!Auth($headers['Authorization'])) {
    http_response_code(403); // Forbidden
    echo json_encode(array("message" => "Invalid token."));
    exit();
}

// If the token is valid, proceed with the rest of the script
?>
