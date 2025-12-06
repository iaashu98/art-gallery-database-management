<?php
/**
 * Artist Delete Script
 */
require_once 'connection.php';
$message = '';
$messageClass = '';

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['artistid'])) {
    $artistid = trim($_POST['artistid']);
    
    if (empty($artistid)) {
        $message = "Error: Artist ID cannot be empty";
        $messageClass = "error";
    } else {
        $checkSql = "SELECT * FROM artist WHERE artistid = ?";
        $checkStmt = $conn->prepare($checkSql);
        
        if ($checkStmt) {
            $checkStmt->bind_param("s", $artistid);
            $checkStmt->execute();
            $result = $checkStmt->get_result();
            
            if ($result->num_rows > 0) {
                $deleteSql = "DELETE FROM artist WHERE artistid = ?";
                $deleteStmt = $conn->prepare($deleteSql);
                
                if ($deleteStmt) {
                    $deleteStmt->bind_param("s", $artistid);
                    if ($deleteStmt->execute()) {
                        $message = "Record with artistid = " . htmlspecialchars($artistid) . " is deleted successfully.";
                        $messageClass = "success";
                    } else {
                        $message = "Error deleting record: " . $deleteStmt->error;
                        $messageClass = "error";
                    }
                    $deleteStmt->close();
                }
            } else {
                $message = "!!!Error in Deleting Record!!!<br> Record '" . htmlspecialchars($artistid) . "' was not found in database.";
                $messageClass = "error";
            }
            $checkStmt->close();
        }
    }
}
$conn->close();
?>
<html>
<head><title>Delete from Artist</title></head>
<style>
b{font-size: 30px;font-family: 'Arial';padding: 27px 62px;}
input[type=text] {width: 110px;box-sizing: border-box;border: 2px solid #ccc;border-radius: 9px;font-size: 16px;background-color: white;background-position: 10px 10px; background-repeat: no-repeat;padding: 22px 20px 22px 10px;-webkit-transition: width 0.4s ease-in-out;transition: width 0.4s ease-in-out;font-weight: bold;font-size: 30px;}
input[type=text]:focus {width: 50%;}
div{font-family: 'Verdana';font-size: 35px;font-weight:bold;margin-left:25px;margin-top: 35px;}
.btn{background-color: forestgreen;color: white;padding: 16px 10px;margin: 8px 20px 20px 50px;border-radius: 24px;cursor: pointer;width: 10%;opacity: 0.7;font-family: "verdana";font-weight: bold;box-shadow: 0px 6px 0px green;transition: all .2s ease-in-out;transform: translate(0, 4px)}
.btn:hover {opacity: 1;background-color:forestgreen;}
.message {font-family: 'Arial';font-size: 24px;padding: 20px;margin: 20px 50px;border-radius: 10px;font-weight: bold;}
.success {background-color: #d4edda;color: #155724;border: 2px solid #c3e6cb;}
.error {background-color: #f8d7da;color: #721c24;border: 2px solid #f5c6cb;}
</style>
<body style="background-color: lavenderblush">
    <h1><center><font style="border:9px solid grey" face="arial">DELETE FROM ARTIST TABLE </font></center></h1>
    <form action="artistdelete.php" method="POST">
        <div>Enter Artist ID:<input type="text" name="artistid" required><br></div>
        <br><br>
        <button type="submit" value ="Delete" class="btn">DELETE</button>
        <button type="reset" value ="Reset" class="btn">RESET</button>
    </form>
    <?php if (!empty($message)): ?>
        <div class="message <?php echo $messageClass; ?>"><?php echo $message; ?></div>
    <?php endif; ?>
</body>
</html>
