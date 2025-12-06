<?php
require_once 'connection.php';
$searchResult = '';
$artid = '';

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['artid'])) {
    $artid = trim($_POST['artid']);
    
    if (!empty($artid)) {
        $sql = "SELECT * FROM artwork WHERE artid = ?";
        $stmt = $conn->prepare($sql);
        
        if ($stmt) {
            $stmt->bind_param("s", $artid);
            $stmt->execute();
            $result = $stmt->get_result();
            
            if ($result->num_rows > 0) {
                $searchResult = "<table><tr><th>ArtID</th><th>Title</th><th>Year</th><th>Type of Art</th><th>Price</th><th>E_ID</th><th>G_ID</th><th>Artist ID</th></tr>";
                while($row = $result->fetch_assoc()) {
                    $searchResult .= "<tr><td>" . htmlspecialchars($row["artid"]) . "</td><td>" . htmlspecialchars($row["title"]) . "</td><td>" . htmlspecialchars($row["year"]) . "</td><td>" . htmlspecialchars($row["type_of_art"]) . "</td><td>" . htmlspecialchars($row["price"]) . "</td><td>" . htmlspecialchars($row["eid"]) . "</td><td>" . htmlspecialchars($row["gid"]) . "</td><td>" . htmlspecialchars($row["artistid"]) . "</td></tr>";
                }
                $searchResult .= "</table>";
            } else {
                $searchResult = "<p>Please Enter Correct Art ID</p>";
            }
            $stmt->close();
        }
    }
}
$conn->close();
?>
<html>
<head><title>Search Artwork</title></head>
<style>
table{border-collapse:collapse;width:60%;padding:150px;margin-left:280px;} 
th,td{text-align:center;padding:21px;background-color:honeydew;}
tr:nth-child(even){background-color:#f2f2f2;font-family:"arial";font-weight:bold;}
th{background-color:mediumslateblue;color:white;font-weight:bold;font-family:"verdana";}
input[type=text]{width:110px;box-sizing:border-box;border:2px solid #ccc;border-radius:9px;font-size:16px;background-color:white;padding:25px 20px 22px 10px;transition:width 0.4s ease-in-out;font-weight:bold;font-size:30px;}
input[type=text]:focus{width:60%;}
div{font-family:"verdana";font-weight:bold;font-size:30px;margin-left:25px;margin-top:35px;}
.btn{background-color:forestgreen;color:white;padding:16px 10px;margin:8px 20px 20px 50px;border-radius:24px;cursor:auto;width:10%;opacity:0.7;font-family:"verdana";font-weight:bold;box-shadow:0px 6px 0px green;transition:all .2s ease-in-out;transform:translate(0,4px)}
.btn:hover{opacity:1;background-color:forestgreen;}
b{font-family:"verdana";background-color:lightcyan;color:black;margin-left:80px;border-radius:8px;text-align:center;font-size:30px;width:85%;}
p{font-family:"verdana";background-color:blueviolet;color:black;margin-top:4px;border-radius:8px;text-align:center;font-size:30px;margin-left:80px;width:35%;}
</style>
<body style="background-color:aliceblue">
    <h1><center><font style="border:9px solid grey" face="arial">SEARCH FROM ARTWORK TABLE </font></center></h1>
    <form action="artsearch.php" method="post">
        <div>Enter Artwork ID:<input type="text" name="artid"><br></div>
        <br><br>
        <button type="submit" value ="Find" class="btn">SEARCH</button>
    </form>
    <?php if (!empty($artid)): ?>
        <b><br>Entered Art ID is <?php echo htmlspecialchars($artid); ?> and the Corresponding table is shown Below <br><br></b>
    <?php endif; ?>
    <?php echo $searchResult; ?>
</body>
</html>