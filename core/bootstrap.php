<?php
/**
 * ---------------------------------------------------------------
 * BOOTSTRAP FILE
 * ---------------------------------------------------------------
 * This file is responsible for initializing the core components
 * of the application including:
 * - Session management
 * - Application configuration
 * - Database connection
 * - Default timezone
 * - Global helper functions
 *
 * This file should be included at the beginning of all entry points
 * (e.g., index.php, route files) to ensure proper application setup.
 */

// ---------------------------------------------------------------
// Start Session
// ---------------------------------------------------------------
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

// ---------------------------------------------------------------
// Load Configuration
// ---------------------------------------------------------------
// Load global constants like BASE_URL, DB_HOST, etc.
require_once __DIR__ . 'constants.php';

// ---------------------------------------------------------------
// Load Database Connection
// ---------------------------------------------------------------
// Establish a global PDO connection to the database
require_once __DIR__ . 'database.php';

// ---------------------------------------------------------------
// Set Default Timezone
// ---------------------------------------------------------------
// Ensures consistent date/time handling across the application
date_default_timezone_set('Asia/Jakarta');

// ---------------------------------------------------------------
// Global Helper Functions
// ---------------------------------------------------------------

/**
 * Generate full base URL from a given path
 *
 * @param string $path Relative path after base URL (optional)
 * @return string Full absolute URL
 */
function base_url(string $path = ''): string {
    return rtrim(BASE_URL, '/') . '/' . ltrim($path, '/');
}