<?php
$apikey = "at_kY40S4m9EQJqlMD0fHdhb4oIrEiWF";
$domain = "examjhbple.com";

// Create the API URL
$url = "https://www.whoisxmlapi.com/whoisserver/WhoisService?apiKey=$apikey&domainName=$domain";

// Make the API request
$response = file_get_contents($url);

if (strpos($response, 'No match for domain') !== false) {
    echo "$domain is free";
} else {
    echo "$domain is not free";
}
