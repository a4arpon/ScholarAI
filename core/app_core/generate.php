<?php

// Set the API endpoint
$url = "https://api.openai.com/v1/engines/text-davinci-002/jobs";

// Set the API key
$api_key = "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";

// Set the prompt text
$prompt = "What is the capital of France?";

// Set the max tokens parameter
$max_tokens = 1024;

// Create the request data in JSON format
$data = array(
    "prompt" => $prompt,
    "max_tokens" => $max_tokens
);
$json_data = json_encode($data);

// Initialize cURL
$curl = curl_init();

// Set cURL options
curl_setopt_array($curl, array(
    CURLOPT_URL => $url,
    CURLOPT_RETURNTRANSFER => true,
    CURLOPT_HTTPHEADER => array(
        "Content-Type: application/json",
        "Authorization: Bearer " . $api_key
    ),
    CURLOPT_POST => true,
    CURLOPT_POSTFIELDS => $json_data
)
);

// Make the API request
$response = curl_exec($curl);

// Check for errors
if (!$response) {
    die("cURL request failed with error: " . curl_error($curl));
}

// Decode the JSON response
$response_data = json_decode($response, true);

// Get the text response
$text_response = $response_data['choices'][0]['text'];

// Output the text response
echo $text_response;

// Close the cURL session
curl_close($curl);