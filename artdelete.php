<?php
/**
 * Artwork Delete Script
 * Handles deletion of artwork records from the database
 */

// Include database connection
require_once 'connection.php';

// Initialize variables
$message = '';
$messageClass = '';

// Check if form was submitted
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['artid'])) {
    $artid = trim($_POST['artid']);
    
    // Validate input
    if (empty($artid)) {
        $message = "Error: Artwork ID cannot be empty";
        $messageClass = "error";
    } else {
        // First check if record exists
        $checkSql = "SELECT * FROM artwork WHERE artid = ?";
        $checkStmt = $conn->prepare($checkSql);
        
        if ($checkStmt === false) {
            $message = "Error preparing statement: " . $conn->error;
            $messageClass = "error";
        } else {
            $checkStmt->bind_param("s", $artid);
            $checkStmt->execute();
            $result = $checkStmt->get_result();
            
            if ($result->num_rows > 0) {
                // Record exists, proceed with deletion
                $deleteSql = "DELETE FROM artwork WHERE artid = ?";
                $deleteStmt = $conn->prepare($deleteSql);
                
                if ($deleteStmt === false) {
                    $message = "Error preparing delete statement: " . $conn->error;
                    $messageClass = "error";
                } else {
                    $deleteStmt->bind_param("s", $artid);
                    
                    if ($deleteStmt->execute()) {
                        $message = "Record with Art ID = " . htmlspecialchars($artid) . " is deleted successfully.";
                        $messageClass = "success";
                    } else {
                        $message = "Error deleting record: " . $deleteStmt->error;
                        $messageClass = "error";
                    }
                    $deleteStmt->close();
                }
            } else {
                $message = "!!!Error in Deleting Record!!!<br> Record '" . htmlspecialchars($artid) . "' was not found in database.";
                $messageClass = "error";
            }
            $checkStmt->close();
        }
    }
}

$conn->close();
?>
<html>
<head>
    <title>Delete from Artwork</title>
</head>
<style>
b{
    font-size: 30px;
    font-family: 'Arial';
    padding: 27px 62px;
}
input[type=text] {
    width: 120px;
    font-weight: bold;
    box-sizing: border-box;
    border: 2px solid #ccc;
    border-radius: 9px;
    font-size: 26px;
    background-color: white;
    background-position: 10px 10px; 
    background-repeat: no-repeat;
    padding: 27px 20px 22px 10px;
    -webkit-transition: width 0.4s ease-in-out;
    transition: width 0.4s ease-in-out;
}
input[type=text]:focus {
    width: 50%;
}
div{
	font-family: 'Verdana';
	font-size: 35px;
	font-weight:bold;
	margin-left:25px;
	margin-top: 35px;
}
.btn{
	background-color: forestgreen;
    color: white;
    padding: 16px 10px;
    margin: 8px 20px 20px 50px;
    border-radius: 24px;
    cursor: pointer;
    width: 10%;
    opacity: 0.7;
    align-content: center;
    font-family: "verdana";
    font-weight: bold;
    -webkit-box-shadow: 0px 6px 0px green;
    -moz-box-shadow: 0px 6px 0px green;
    box-shadow: 0px 6px 0px green;
    -webkit-transition: all .1s ease-in-out;
    -moz-transition: all .2s ease-in-out;
    transition: all .2s ease-in-out;
    -webkit-transform: translate(0, 5px) rotateX(25deg);
    -moz-transform: translate(0, 4px);
    transform: translate(0, 4px)
    }
.btn:hover 
{
    opacity: 1;
    background-color:forestgreen;
}
.message {
    font-family: 'Arial';
    font-size: 24px;
    padding: 20px;
    margin: 20px 50px;
    border-radius: 10px;
    font-weight: bold;
}
.success {
    background-color: #d4edda;
    color: #155724;
    border: 2px solid #c3e6cb;
}
.error {
    background-color: #f8d7da;
    color: #721c24;
    border: 2px solid #f5c6cb;
}
</style>
<body style="background-color: lavenderblush">
    <h1><center><font style="border:9px solid grey" face="arial">DELETE FROM ARTWORK TABLE </font></center></h1>
	<form action="artdelete.php" method="POST">
		<div>Enter Artwork ID:<input type="text" name="artid" required><br></div>
		<br><br>
		<button type="submit" value ="Delete" class="btn">DELETE</button>
        <button type="reset" value ="Reset" class="btn">RESET</button>
	</form>
    <?php if (!empty($message)): ?>
        <div class="message <?php echo $messageClass; ?>">
            <?php echo $message; ?>
        </div>
    <?php endif; ?>
</body>
</html>