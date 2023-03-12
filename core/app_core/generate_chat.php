<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Set up the OpenAI API endpoint
    $url = "https://api.openai.com/v1/engines/text-davinci-003/completions";

    // Set your OpenAI API key
    $api_key = "sk-" . $_SESSION['temp_key'];

    // Set up the request headers
    $headers = array(
        "Content-Type: application/json",
        "Authorization: Bearer " . $api_key,
    );

    // Set up the request data
    $data = array(
        "prompt" => "'" . $_POST['input'] . "', answer this under 40 words.",
        "temperature" => 0.10,
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
} else {
    echo ("NodeMon Error");
}

// Get client IP address
function get_client_ip()
{
    $ipaddress = '';
    if (isset($_SERVER['HTTP_CLIENT_IP']))
        $ipaddress = $_SERVER['HTTP_CLIENT_IP'];
    else if (isset($_SERVER['HTTP_X_FORWARDED_FOR']))
        $ipaddress = $_SERVER['HTTP_X_FORWARDED_FOR'];
    else if (isset($_SERVER['HTTP_X_FORWARDED']))
        $ipaddress = $_SERVER['HTTP_X_FORWARDED'];
    else if (isset($_SERVER['HTTP_FORWARDED_FOR']))
        $ipaddress = $_SERVER['HTTP_FORWARDED_FOR'];
    else if (isset($_SERVER['HTTP_FORWARDED']))
        $ipaddress = $_SERVER['HTTP_FORWARDED'];
    else if (isset($_SERVER['REMOTE_ADDR']))
        $ipaddress = $_SERVER['REMOTE_ADDR'];
    else
        $ipaddress = 'UNKNOWN';
    return $ipaddress;
}
?>