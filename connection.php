<?php
/**
 * Database Connection File
 * 
 * This file establishes a connection to the MySQL database using mysqli.
 * Include this file in any PHP script that needs database access.
 */

// Include configuration
require_once 'config.php';

// Create connection
$conn = new mysqli(DB_HOST, DB_USER, DB_PASS, DB_NAME);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Set charset to utf8mb4 for better character support
$conn->set_charset("utf8mb4");
?>
