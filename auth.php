<?php

function Auth($api_key){
    // Define your valid tokens
    $valid_tokens = array(
        'FREETOKEN',
        'TOKEN1',
        'TOKEN2',
    );
    
    // Check if the provided token is valid
    if(in_array($api_key, $valid_tokens)) return true;
    
    // If the token is not valid, return false
    return false;
}

// Retrieve the API key from the query string
$api_key = $_GET['api_key'] ?? null;

if (!$api_key) {
    http_response_code(401); // Unauthorized
    echo json_encode(array("message" => "No API key provided."));
    exit();
}

// Call the Auth function to validate the API key
if (!Auth($api_key)) {
    http_response_code(403); // Forbidden
    echo json_encode(array("message" => "Invalid API key."));
    exit();
}

// If the API key is valid, proceed with the rest of the script
// Your script's main logic goes here
?>
// If the API key is valid, proceed with the rest of the script
// Your script's main logic goes here
?>
