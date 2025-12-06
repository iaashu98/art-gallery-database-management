<?php
/**
 * Artist Insert Script
 * Handles insertion of new artist records into the database
 */

// Include database connection
require_once 'connection.php';

// Check if all required fields are set
if (isset($_POST['artistid']) && isset($_POST['G_ID']) && isset($_POST['custid']) && 
    isset($_POST['fname1']) && isset($_POST['lname1']) && isset($_POST['E_ID']) && 
    isset($_POST['birthplace']) && isset($_POST['style'])) {
    
    // Get and sanitize input data
    $artistid = trim($_POST['artistid']);
    $gid = trim($_POST['G_ID']);
    $fname1 = trim($_POST['fname1']);
    $lname1 = trim($_POST['lname1']);
    $eid = trim($_POST['E_ID']);
    $birthplace = trim($_POST['birthplace']);
    $style = trim($_POST['style']);
    $custid = trim($_POST['custid']);
    
    // Validate required fields are not empty
    if (empty($artistid) || empty($gid) || empty($fname1) || empty($lname1)) {
        http_response_code(400);
        echo 'Error: All required fields must be filled';
        exit;
    }
    
    // Prepare SQL statement with placeholders
    $sql = "INSERT INTO artist (artistid, gid, custid, eid, fname1, lname1, birthplace, style) 
            VALUES (?, ?, ?, ?, ?, ?, ?, ?)";
    
    // Prepare statement
    $stmt = $conn->prepare($sql);
    
    if ($stmt === false) {
        http_response_code(500);
        echo 'Error preparing statement: ' . $conn->error;
        exit;
    }
    
    // Bind parameters (s = string)
    $stmt->bind_param("ssssssss", $artistid, $gid, $custid, $eid, $fname1, $lname1, $birthplace, $style);
    
    // Execute statement
    if ($stmt->execute()) {
        http_response_code(200);
        echo 'Successfully posted.';
    } else {
        http_response_code(500);
        echo 'Unable to post: ' . $stmt->error;
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