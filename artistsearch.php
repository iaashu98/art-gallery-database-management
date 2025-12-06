<?php
require_once 'connection.php';
$searchResult = '';
$artistid = '';

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['artistid'])) {
    $artistid = trim($_POST['artistid']);
    if (!empty($artistid)) {
        $sql = "SELECT * FROM artist WHERE artistid = ?";
        $stmt = $conn->prepare($sql);
        if ($stmt) {
            $stmt->bind_param("s", $artistid);
            $stmt->execute();
            $result = $stmt->get_result();
            if ($result->num_rows > 0) {
                $searchResult = "<br><br><br><br><table><tr><th>Artist ID</th><th>G_ID</th><th>Cust ID</th><th>E_ID</th><th>FName</th><th>LName</th><th>Birth Place</th><th><br>Style<br></br></th></tr>";
                while($row = $result->fetch_assoc()) {
                    $searchResult .= "<tr><td>" . htmlspecialchars($row["artistid"]) . "</td><td>" . htmlspecialchars($row["gid"]) . "</td><td>" . htmlspecialchars($row["custid"]) . "</td><td>" . htmlspecialchars($row["eid"]) . "</td><td>" . htmlspecialchars($row["fname1"]) . "</td><td>" . htmlspecialchars($row["lname1"]) . "</td><td>" . htmlspecialchars($row["birthplace"]) . "</td><td><br>" . htmlspecialchars($row["style"]) . "<br></br></td></tr>";
                }
                $searchResult .= "</table>";
            } else {
                $searchResult = "<span><br><br>OPPS!!! Search Unsuccessful!<br><br>There is no such Artist ID exists. Please Enter Correct Artist ID and Search again.</span>";
            }
            $stmt->close();
        }
    }
}
$conn->close();
?>
<html>
<head><title>Search Artist</title></head>
<style>
table{border-collapse:collapse;width:60%;padding:150px;margin-left:280px;} 
th,td{text-align:center;padding:8px;border-radius:12px;}
tr:nth-child(even){background-color:#f2f2f2;font-family:"arial";font-weight:bold;}
th{background-color:mediumslateblue;color:white;font-family:"verdana";font-weight:bold;}
input[type=text]{width:110px;box-sizing:border-box;border:2px solid #ccc;border-radius:9px;font-size:16px;background-color:white;padding:22px 20px 22px 10px;transition:width 0.4s ease-in-out;font-weight:bold;font-size:30px;}
input[type=text]:focus{width:60%;}
div{font-family:"verdana";font-weight:bold;font-size:30px;margin-left:25px;margin-top:35px;}
.btn{background-color:forestgreen;color:white;padding:16px 10px;margin:8px 20px 20px 50px;border-radius:24px;cursor:pointer;width:10%;opacity:0.7;font-family:"verdana";font-weight:bold;box-shadow:0px 6px 0px green;transition:all .2s ease-in-out;transform:translate(0,4px)}
.btn:hover{opacity:1;background-color:forestgreen;}
b{font-family:"verdana";background-color:lightcyan;color:black;margin-left:80px;border-radius:8px;text-align:center;font-size:30px;width:85%;}
span{font-family:"verdana";background-color:lightcyan;color:black;margin-top:4px;border-radius:8px;text-align:center;font-size:30px;margin-left:0px;width:35%;font-weight:bold;}
</style>
<body style="background-color:lavender">
    <h1><center><font style="border:9px solid grey" face="arial">SEARCH FROM ARTIST TABLE </font></center></h1>
	<form action="artistsearch.php" method="post">
		<div>Enter Artist ID:<input type="text" name="artistid"><br></div>
		<br><br>
		<button type="submit" value ="Find" class="btn">SEARCH</button>
	</form>
<?php if (!empty($artistid)): ?>
	<b><br>Entered Artist ID is <?php echo htmlspecialchars($artistid); ?> <br></b>
    <?php if (strpos($searchResult, 'table') !== false): ?>
        <b><br>Search Successful<br><br></b>
    <?php endif; ?>
<?php endif; ?>
<?php echo $searchResult; ?>
</body>
</html>