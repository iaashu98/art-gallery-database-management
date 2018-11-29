<!DOCTYPE html>
<html>
<head>
 <title>Exhibition Display</title>
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
$conn = mysqli_connect("localhost", "root", "", "art_gallery");

  if ($conn->connect_error) {
   die("Connection failed: " . $conn->connect_error);
  } 

  $sql = "SELECT artid, title, year, type_of_art, price, eid, gid, artistid FROM artwork";
  $result = $conn->query($sql);
  if ($result->num_rows > 0)
   {
   
   while($row = $result->fetch_assoc())
    {
    echo "<tr><td>" . $row["artid"]. "</td><td>" . $row["title"]. "</td><td>" . $row["year"]. "</td><td>" . $row["type_of_art"]. "</td><td>" . $row["price"]. "</td><td>" . $row["eid"]. "</td><td>" . $row["gid"]. "</td><td>"
    . $row["artistid"]. "</td></tr>";
    }
    echo "</table>";
   
    }
else 
  { 
    echo "0 results"; 
  }
$conn->close();
?>
</table>
</body>
</html>