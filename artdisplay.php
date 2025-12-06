<!DOCTYPE html>
<html>
<head>
 <title>Artwork Display</title>
 <style>
  table 
  {
   border-collapse: collapse;
   width: 100%;
   color: #588c7e;
   font-family: monospace;
   font-size: 25px;
   text-align: left;
   font-family:"Verdana";
   text-align: center;
   border-radius: 14px;
  } 
  th 
  {
   background-color: mediumpurple;
   color: white;
   border-radius: 14px;
  }
  h1{
    font-family: "Arial";
    font-size: 50px;
     color: slategrey;
  }
  td{
    padding: 12px;
    border-radius: 14px;
  }
  tr:nth-child(even) {background-color: #f2f2f2; 
    border-radius: 14px;}
 </style>
</head>
<body style="background-color: lavender">
  <h1><center>The table contents are Displayed below</center></h1>
 <table>
 <tr>
  <th><br>Artwork ID<br><br></th> 
  <th><br>Title<br><br></th> 
  <th><br>Year<br><br></th>
  <th><br>Type of Art<br><br></th>
  <th><br>Price<br><br></th>
  <th><br>E_ID<br><br></th>
  <th><br>G_ID<br><br></th>
  <th><br>Artist ID<br><br></th>
  <br><br>
 </tr>
 <?php
// Include database connection
require_once 'connection.php';

  $sql = "SELECT artid, title, year, type_of_art, price, eid, gid, artistid FROM artwork";
  $result = $conn->query($sql);
  
  if ($result->num_rows > 0) {
   while($row = $result->fetch_assoc()) {
    // Use htmlspecialchars to prevent XSS attacks
    echo "<tr><td>" . htmlspecialchars($row["artid"]) . "</td><td>" . htmlspecialchars($row["title"]) . "</td><td>" . htmlspecialchars($row["year"]) . "</td><td>" . htmlspecialchars($row["type_of_art"]) . "</td><td>" . htmlspecialchars($row["price"]) . "</td><td>" . htmlspecialchars($row["eid"]) . "</td><td>" . htmlspecialchars($row["gid"]) . "</td><td>" . htmlspecialchars($row["artistid"]) . "</td></tr>";
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