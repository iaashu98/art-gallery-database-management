<?php
/**
 * Exhibition Insert Script
 * Handles insertion of new exhibition records into the database
 */

// Include database connection
require_once 'connection.php';

// Check if all required fields are set
if (isset($_POST['E_ID']) && isset($_POST['G_ID']) && isset($_POST['startdate']) && isset($_POST['enddate'])) {
    
    // Get and sanitize input data
    $eid = trim($_POST['E_ID']);
    $gid = trim($_POST['G_ID']);
    $startdate = trim($_POST['startdate']);
    $enddate = trim($_POST['enddate']);
    
    // Validate required fields are not empty
    if (empty($eid) || empty($gid) || empty($startdate) || empty($enddate)) {
        http_response_code(400);
        echo 'Error: All required fields must be filled';
        exit;
    }
    
    // Prepare SQL statement with placeholders
    $sql = "INSERT INTO exhibition (eid, gid, startdate, enddate) VALUES (?, ?, ?, ?)";
    
    // Prepare statement
    $stmt = $conn->prepare($sql);
    
    if ($stmt === false) {
        http_response_code(500);
        echo 'Error preparing statement: ' . $conn->error;
        exit;
    }
    
    // Bind parameters (s = string)
    $stmt->bind_param("ssss", $eid, $gid, $startdate, $enddate);
    
    // Execute statement
    if ($stmt->execute()) {
        http_response_code(200);
        echo 'Successfully inserted into Exhibition';
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
