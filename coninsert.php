<?php
/**
 * Contacts Insert Script
 * Handles insertion of new contact records into the database
 */

// Include database connection
require_once 'connection.php';

// Check if all required fields are set
if (isset($_POST['CUSTID']) && isset($_POST['PHONE'])) {
    
    // Get and sanitize input data
    $custid = trim($_POST['CUSTID']);
    $phone = trim($_POST['PHONE']);
    
    // Validate required fields are not empty
    if (empty($custid) || empty($phone)) {
        http_response_code(400);
        echo 'Error: All required fields must be filled';
        exit;
    }
    
    // Prepare SQL statement with placeholders
    $sql = "INSERT INTO contacts (CUSTID, PHONE) VALUES (?, ?)";
    
    // Prepare statement
    $stmt = $conn->prepare($sql);
    
    if ($stmt === false) {
        http_response_code(500);
        echo 'Error preparing statement: ' . $conn->error;
        exit;
    }
    
    // Bind parameters (s = string)
    $stmt->bind_param("ss", $custid, $phone);
    
    // Execute statement
    if ($stmt->execute()) {
        http_response_code(200);
        echo 'Successfully inserted contact';
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
