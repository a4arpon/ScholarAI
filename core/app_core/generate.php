<?php

// Set up the OpenAI API endpoint
$url = "https://api.openai.com/v1/engines/text-davinci-003/completions";

// Set your OpenAI API key
$api_key = "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";

// Set up the request headers
$headers = array(
    "Content-Type: application/json",
    "Authorization: Bearer " . $api_key,
);

// Set up the request data
$data = array(
    "prompt" => $_GET['input'],
    "temperature" => 0.15,
    "max_tokens" => 50,
);

// Send the request using cURL
$ch = curl_init($url);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_POST, true);
curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($data));
curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);

$response = curl_exec($ch);
curl_close($ch);

// Process the response
if ($response === false) {
    echo "Error: " . curl_error($ch);
} else {
    $response_data = json_decode($response, true);
    $text = $response_data["choices"][0]["text"];
    echo $text;
}

?>
