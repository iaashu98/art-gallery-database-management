<?php
/**
 * Gallery Insert Script
 * Handles insertion of new gallery records into the database
 */

// Include database connection
require_once 'connection.php';

// Check if all required fields are set
if (isset($_POST['G_ID']) && isset($_POST['gname']) && isset($_POST['location'])) {
    
    // Get and sanitize input data
    $gid = trim($_POST['G_ID']);
    $gname = trim($_POST['gname']);
    $location = trim($_POST['location']);
    
    // Validate required fields are not empty
    if (empty($gid) || empty($gname) || empty($location)) {
        http_response_code(400);
        echo 'Error: All required fields must be filled';
        exit;
    }
    
    // Prepare SQL statement with placeholders
    $sql = "INSERT INTO gallery (gid, gname, location) VALUES (?, ?, ?)";
    
    // Prepare statement
    $stmt = $conn->prepare($sql);
    
    if ($stmt === false) {
        http_response_code(500);
        echo 'Error preparing statement: ' . $conn->error;
        exit;
    }
    
    // Bind parameters (s = string)
    $stmt->bind_param("sss", $gid, $gname, $location);
    
    // Execute statement
    if ($stmt->execute()) {
        http_response_code(200);
        echo 'Successfully inserted into Gallery';
    } else {
        http_response_code(500);
        echo 'Unable to insert: ' . $stmt->error;
    }
    
    // Close statement
    $stmt->close();
    
} else {
    http_response_code(400);
    echo 'Error: Missing required fields';
}

// Close connection
$conn->close();
?>
