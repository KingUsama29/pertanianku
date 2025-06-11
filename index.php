<?php
/**
 * ---------------------------------------------------------------
 * ENTRY POINT (index.php)
 * ---------------------------------------------------------------
 * This file serves as the main front controller for the application.
 * It handles:
 * - Bootstrapping the application
 * - Parsing the requested URI
 * - Matching the request to defined routes
 * - Dispatching the corresponding route file
 *
 * If the route is not defined or the file does not exist,
 * a 404 response will be returned.
 */

// ---------------------------------------------------------------
// Load the Application Bootstrap
// ---------------------------------------------------------------
require_once __DIR__ . '/core/bootstrap.php';

// ---------------------------------------------------------------
// Parse Current Request Path
// ---------------------------------------------------------------
// Extract the path from the current request URI
$uri = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);

// Determine the base path (useful if app is not in root directory)
$base = str_replace('/index.php', '', $_SERVER['SCRIPT_NAME']);

// Calculate the route path relative to the base path
$path = '/' . ltrim(str_replace($base, '', $uri), '/');

// ---------------------------------------------------------------
// Define Application Routes
// ---------------------------------------------------------------
// Map of URL paths to PHP handler files
$routes = [
    '/' => 'routes/home.php',
    '/login' => 'routes/login.php',
    '/logout' => 'routes/logout.php',
    '/dashboard' => 'routes/dashboard/index.php',
    '/dashboard/daftar_petani' => 'routes/dashboard/daftar_petani.php',
    '/dashboard/hasil_panen' => 'routes/dashboard/hasil_panen.php',
];

// Resolve the requested page from the route map
$page = $routes[$path] ?? null;

// ---------------------------------------------------------------
// Route Dispatching
// ---------------------------------------------------------------
if ($page && file_exists($page)) {
    // Route exists and file is found, include it
    include $page;
} else {
    // Route not found or file missing, return 404
    http_response_code(404);
    echo "<h1>404 - Page Not Found</h1>";
}