<?php
$reference = $_GET['reference']; // Get the reference code from the URL

// Set the API endpoint for verification
$api_url = "https://sandbox-api-d.squadco.com/transaction/verify/$reference";

// Initialize cURL session
$curl = curl_init();

// Set cURL options
curl_setopt($curl, CURLOPT_URL, $api_url);
curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);

// Execute cURL session and get the response
$response = curl_exec($curl);

// Close cURL session
curl_close($curl);

// Parse the JSON response
$data = json_decode($response, true);

if ($data && isset($data['success']) && $data['success'] === 'true') {
    // Payment was successful, you can proceed with processing the order
    echo "Payment was successful. Order processed!";
} else {
    // Payment was not successful, handle accordingly
    echo "Payment verification failed. Please contact support.";
    var_dump($data);
}
?>
