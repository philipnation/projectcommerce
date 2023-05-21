<?php

// base path

$basePath = '/venor';

// Define your routes
$routes = [
    $basePath . '/' => 'views/home.php',
    $basePath . '/about' => 'views/about.php',
    $basePath . '/contact' => 'views/contact.php',
    $basePath . '/user' => 'views/user.php',
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
    echo 'Error 404: Page not found';
}
?>
