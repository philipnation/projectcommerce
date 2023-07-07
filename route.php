<?php

// base path

$basePath = '/venormall';

// Define your routes
$routes = [
    $basePath . '/' => 'views/index.php',
    $basePath . '/login' => 'views/login.php',
    $basePath . '/pricing' => 'views/pricing.php',
    $basePath . '/register' => 'views/register.php',
    $basePath . '/storedetails' => 'views/storedetails.html',
    $basePath . '/about' => 'views/about.php',
    $basePath . '/terms' => 'views/terms.php',
    $basePath . '/policy' => 'views/policy.php',
    $basePath . '/verify' => 'views/otp.php',
    $basePath . '/success_otp' => 'handlers/changeactive.php',
    $basePath . '/forgot-password' => 'views/forgot.php',
    $basePath . '/reset' => 'views/reset.php',
    $basePath . '/views' => 'views/404.html',
    // Add more routes as needed
];

// Get the requested URL
$requestUrl = $_SERVER['REQUEST_URI'];

// Remove query string parameters
$requestUrl = strtok($requestUrl, '?');

// Check if the requested route exists
if (array_key_exists($requestUrl, $routes)) {
    // Include the corresponding file
    include $routes[$requestUrl];
} else {
    // Route not found, handle the error or display a 404 page
    //echo 'Error 404: Page not found';
    include("views/404.html");
}
?>