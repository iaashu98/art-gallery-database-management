<?php
require_once 'connection.php';
$searchResult = '';
$eid = '';

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['eid'])) {
    $eid = trim($_POST['eid']);
    if (!empty($eid)) {
        $sql = "SELECT * FROM exhibition WHERE eid = ?";
        $stmt = $conn->prepare($sql);
        if ($stmt) {
            $stmt->bind_param("s", $eid);
            $stmt->execute();
            $result = $stmt->get_result();
            if ($result->num_rows > 0) {
                $searchResult = "<br><br><br><table><tr><th>Exhibition ID</th><th>Gallery ID</th><th>Start Date</th><th>End Date</th></tr>";
                while($row = $result->fetch_assoc()) {
                    $searchResult .= "<tr><td>" . htmlspecialchars($row["eid"]) . "</td><td>" . htmlspecialchars($row["gid"]) . "</td><td>" . htmlspecialchars($row["startdate"]) . "</td><td>" . htmlspecialchars($row["enddate"]) . "</td></tr>";
                }
                $searchResult .= "</table>";
            } else {
                $searchResult = "<span><br><br>Search Unsuccessful! Please Enter Correct Exhibition ID.</span>";
            }
            $stmt->close();
        }
    }
}
$conn->close();
?>
<html>
<head><title>Search Exhibition</title></head>
<style>
table{border-collapse:collapse;width:60%;padding:150px;margin-left:280px;} 
th,td{text-align:center;padding:8px;}
tr:nth-child(even){background-color:#f2f2f2;font-family:"arial";font-weight:bold;}
th{background-color:mediumslateblue;color:white;font-family:"verdana";font-weight:bold;}
input[type=text]{width:110px;box-sizing:border-box;border:2px solid #ccc;border-radius:9px;font-size:30px;background-color:white;padding:22px 20px 22px 10px;transition:width 0.4s ease-in-out;font-weight:bold;}
input[type=text]:focus{width:60%;}
div{font-family:"verdana";font-weight:bold;font-size:30px;margin-left:25px;margin-top:35px;}
.btn{background-color:forestgreen;color:white;padding:16px 10px;margin:8px 20px 20px 50px;border-radius:24px;cursor:pointer;width:10%;opacity:0.7;font-family:"verdana";font-weight:bold;box-shadow:0px 6px 0px green;transition:all .2s ease-in-out;transform:translate(0,4px)}
.btn:hover{opacity:1;background-color:forestgreen;}
b{font-family:"verdana";background-color:lightcyan;color:black;margin-left:80px;border-radius:8px;text-align:center;font-size:30px;width:85%;}
span{font-family:"verdana";background-color:lightcyan;color:black;margin-top:4px;border-radius:8px;text-align:center;font-size:30px;margin-left:0px;width:35%;font-weight:bold;}
</style>
<body style="background-color:aliceblue">
    <h1><center><font style="border:9px solid grey" face="arial">SEARCH FROM EXHIBITION TABLE</font></center></h1>
	<form action="esearch.php" method="post">
		<div>Enter Exhibition ID:<input type="text" name="eid"><br></div>
		<br><br>
		<button type="submit" class="btn">SEARCH</button>
	</form>
<?php if (!empty($eid)): ?>
	<b><br>Entered Exhibition ID is <?php echo htmlspecialchars($eid); ?> <br></b>
<?php endif; ?>
<?php echo $searchResult; ?>
</body>
</html>