<!DOCTYPE html>
<html>
<head>
 <title>Artist Display</title>
 <style>
 b{
    font-size: 30px;
    font-family: 'Arial';
    padding: 2px;
    text-align: center;
}
  table 
  {
   border-collapse: collapse;
   width: 100%;
   color: #588c7e;
   font-family: monospace;
   font-size: 25px;
   text-align: left;
   font-family:"Verdana";
   font-weight: bold;
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
     color: black;
     border: 9px solid grey;
     border-radius: 17px;
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
  <h1><center><font style="border:9px solid grey">DISPLAY CONTENTS /\/ ARTIST TABLE</font></center></h1>
 <table>
 <tr>
  <th><br>Artist ID<br><br></th> 
  <th><br>E ID<br><br></th>
  <th><br>Artist Name<br><br></th>
  <th><br>BirthPlace<br><br></th>
  <th><br>Style<br><br></th>
  <th><br>Gallery<br><br></th> 
  <th><br>Customer Name<br><br></th>
  <br><br>
 </tr>
  <?php
// Include database connection
require_once 'connection.php';

  $sql = "SELECT artistid, g.gname, cu.fname, cu.lname, eid, fname1, lname1, birthplace, style from Artist ar join customer cu on ar.custid=cu.custid join gallery g on g.gid=ar.gid";

  if ($result = mysqli_query($conn,$sql)) {
   while($row = $result->fetch_assoc()) {
    // Use htmlspecialchars to prevent XSS attacks
    echo "<tr><td>" . htmlspecialchars($row["artistid"]) . "</td><td>" . htmlspecialchars($row["eid"]) . "</td><td>" . htmlspecialchars($row["fname1"]) . '&nbsp' . htmlspecialchars($row["lname1"]) . "</td><td>" . htmlspecialchars($row["birthplace"]) . "</td><td><br>" . htmlspecialchars($row["style"]) . "<br></br></td><td>" . htmlspecialchars($row["gname"]) . "</td><td>" . htmlspecialchars($row["fname"]) . '&nbsp' . htmlspecialchars($row["lname"]) . "</td></tr>";
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