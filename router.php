<?php
/**
 * Router script for PHP built-in development server
 * This file handles URL rewriting similar to .htaccess for Apache
 * 
 * Usage: php -S localhost:8080 router.php
 */

$requestUri = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);
$requestFile = __DIR__ . $requestUri;

// Remove query string for file checking
$requestUriPath = $requestUri;
if (($pos = strpos($requestUriPath, '?')) !== false) {
    $requestUriPath = substr($requestUriPath, 0, $pos);
}

// Check if the requested file exists and is not a directory (serve static files directly)
if ($requestUriPath !== '/' && file_exists($requestFile) && is_file($requestFile)) {
    return false; // Let PHP serve the file directly
}

// Check if it's a static asset by extension
$staticExtensions = ['css', 'js', 'png', 'jpg', 'jpeg', 'gif', 'ico', 'svg', 'woff', 'woff2', 'ttf', 'eot', 'map'];
$extension = strtolower(pathinfo($requestUriPath, PATHINFO_EXTENSION));
if (in_array($extension, $staticExtensions) && file_exists($requestFile)) {
    return false; // Serve static assets directly
}

// For all other requests, route to index.php (CodeIgniter routing)
// This mimics Apache's mod_rewrite behavior
$_SERVER['SCRIPT_NAME'] = '/index.php';
require __DIR__ . '/index.php';

