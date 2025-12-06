<!DOCTYPE html>
<html>
<head>
 <title>Stored Gallery</title>
 <style>
  b{font-size:30px;font-family:'Arial';padding:2px;text-align:center;}
  table{border-collapse:collapse;width:100%;color:#588c7e;font-family:monospace;font-size:25px;text-align:left;font-family:"Verdana";font-weight:bold;text-align:center;border-radius:14px;} 
  th{background-color:mediumpurple;color:white;border-radius:14px;}
  h1{font-family:"Arial";font-size:50px;border:9px solid grey;border-radius:17px;color:slategrey;}
  td{padding:12px;border-radius:14px;}
  tr:nth-child(even){background-color:#f2f2f2;border-radius:14px;}
 </style>
</head>
<body style="background-color:lavender">
  <h1><center><font style="border:9px solid grey"> STORED PROCEDURE /\/ GALLERY TABLE </font></center></h1>
 <table>
 <tr>
  <th><br>Gallery ID<br><br></th> 
  <th><br>GName<br><br></th> 
  <th><br>Location<br><br></th>
  <br><br>
 </tr>
  <?php
// Include database connection
require_once 'connection.php';

echo " <b><center>Calling Stored Procedure...</center></b>";

  $sql = "CALL display()";
  if ($result = mysqli_query($conn,$sql)) {
   while($row = $result->fetch_assoc()) {
    // Use htmlspecialchars to prevent XSS attacks
    echo "<tr><td>" . htmlspecialchars($row["gid"]) . "</td><td>" . htmlspecialchars($row["gname"]) . "</td><td><br>". htmlspecialchars($row["location"]) . "<br></br></td></tr>";
    }
    echo "</table>";
    } else { 
     echo "0 results"; 
   }
$conn->close();
?>
</table>
</body>
</html>