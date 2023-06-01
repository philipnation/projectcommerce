<?php
// Define your API key and the domain you want to check
$apiKey = "at_kY40S4m9EQJqlMD0fHdhb4oIrEiWF";
$domain = "energychleen.com";

// Construct the API request URL
$url = "https://www.whoisxmlapi.com/whoisserver/WhoisService?apiKey=$apiKey&domainName=$domain";

// Initialize cURL
$curl = curl_init();

// Set the cURL options
curl_setopt($curl, CURLOPT_URL, $url);
curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);

// Send the HTTP request and get the response
$response = curl_exec($curl);

// Check if cURL request was successful
if ($response === false) {
    die("Error: cURL request failed. " . curl_error($curl));
}

// Close the cURL session
curl_close($curl);

// Parse the response JSON
$data = json_decode($response, true);

// Check if the response text contains "No match for domain"
if (strpos($response, 'No match for domain') !== false) {
    echo "The domain " . $domain . " is available.";
} else {
    echo "The domain " . $domain . " is not available.";
}
?>
