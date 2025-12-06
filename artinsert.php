<?php
/**
 * Artwork Insert Script
 * Handles insertion of new artwork records into the database
 */

// Include database connection
require_once 'connection.php';

// Check if all required fields are set
if (isset($_POST['E_ID']) && isset($_POST['G_ID']) && isset($_POST['artid']) && 
    isset($_POST['artistid']) && isset($_POST['title']) && isset($_POST['type_of_art']) && 
    isset($_POST['year']) && isset($_POST['price'])) {
    
    // Get and sanitize input data
    $eid = trim($_POST['E_ID']);
    $gid = trim($_POST['G_ID']);
    $artid = trim($_POST['artid']);
    $artistid = trim($_POST['artistid']);
    $title = trim($_POST['title']);
    $type_of_art = trim($_POST['type_of_art']);
    $year = trim($_POST['year']);
    $price = trim($_POST['price']);
    
    // Validate required fields are not empty
    if (empty($artid) || empty($title) || empty($eid) || empty($gid) || empty($artistid)) {
        http_response_code(400);
        echo 'Error: All required fields must be filled';
        exit;
    }
    
    // Prepare SQL statement with placeholders
    $sql = "INSERT INTO artwork (artid, title, type_of_art, price, eid, gid, artistid, year) 
            VALUES (?, ?, ?, ?, ?, ?, ?, ?)";
    
    // Prepare statement
    $stmt = $conn->prepare($sql);
    
    if ($stmt === false) {
        http_response_code(500);
        echo 'Error preparing statement: ' . $conn->error;
        exit;
    }
    
    // Bind parameters (s = string)
    $stmt->bind_param("ssssssss", $artid, $title, $type_of_art, $price, $eid, $gid, $artistid, $year);
    
    // Execute statement
    if ($stmt->execute()) {
        http_response_code(200);
        echo 'Successfully inserted into Artwork';
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