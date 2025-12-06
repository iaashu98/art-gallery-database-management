<?php
/**
 * Database Configuration File
 * 
 * This file contains all database configuration constants.
 * Update these values to match your local database setup.
 */

// Database Configuration
define('DB_HOST', 'localhost');
define('DB_USER', 'root');
define('DB_PASS', '');
define('DB_NAME', 'art_gallery');

// Error Reporting (set to false in production)
define('DISPLAY_ERRORS', true);

if (DISPLAY_ERRORS) {
    ini_set('display_errors', 1);
    ini_set('display_startup_errors', 1);
    error_reporting(E_ALL);
}
?>
