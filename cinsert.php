<?php
/**
 * Customer Insert Script
 * Handles insertion of new customer records and their contact information
 */

// Include database connection
require_once 'connection.php';

// Check if all required fields are set
if (isset($_POST['custid']) && isset($_POST['G_ID']) && isset($_POST['fname']) && 
    isset($_POST['lname']) && isset($_POST['dob']) && isset($_POST['artworkid']) && 
    isset($_POST['address']) && isset($_POST['phone'])) {
    
    // Get and sanitize input data
    $custid = trim($_POST['custid']);
    $gid = trim($_POST['G_ID']);
    $fname = trim($_POST['fname']);
    $lname = trim($_POST['lname']);
    $dob = trim($_POST['dob']);
    $address = trim($_POST['address']);
    $phone = trim($_POST['phone']);
    $artworkid = trim($_POST['artworkid']);
    
    // Validate required fields are not empty
    if (empty($custid) || empty($fname) || empty($lname) || empty($dob)) {
        http_response_code(400);
        echo 'Error: All required fields must be filled';
        exit;
    }
    
    // Start transaction
    $conn->begin_transaction();
    
    try {
        // Prepare SQL statement for customer table
        $sql1 = "INSERT INTO customer (custid, gid, artworkid, fname, lname, dob, address) 
                 VALUES (?, ?, ?, ?, ?, ?, ?)";
        
        $stmt1 = $conn->prepare($sql1);
        if ($stmt1 === false) {
            throw new Exception('Error preparing customer statement: ' . $conn->error);
        }
        
        // Bind parameters for customer
        $stmt1->bind_param("sssssss", $custid, $gid, $artworkid, $fname, $lname, $dob, $address);
        
        // Execute customer insert
        if (!$stmt1->execute()) {
            throw new Exception('Error inserting customer: ' . $stmt1->error);
        }
        $stmt1->close();
        
        // Prepare SQL statement for contacts table
        $sql2 = "INSERT INTO contacts (CUSTID, PHONE) VALUES (?, ?)";
        
        $stmt2 = $conn->prepare($sql2);
        if ($stmt2 === false) {
            throw new Exception('Error preparing contacts statement: ' . $conn->error);
        }
        
        // Bind parameters for contacts
        $stmt2->bind_param("ss", $custid, $phone);
        
        // Execute contacts insert
        if (!$stmt2->execute()) {
            throw new Exception('Error inserting contact: ' . $stmt2->error);
        }
        $stmt2->close();
        
        // Commit transaction
        $conn->commit();
        
        http_response_code(200);
        echo 'Successfully Inserted into Customer table.';
        
    } catch (Exception $e) {
        // Rollback transaction on error
        $conn->rollback();
        http_response_code(500);
        echo 'Unable to post: ' . $e->getMessage();
    }
    
} else {
    http_response_code(400);
    echo 'Error: Missing required fields';
}

// Close connection
$conn->close();
?>