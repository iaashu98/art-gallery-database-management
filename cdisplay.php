<!DOCTYPE html>
<html>
<head>
 <title>Customer Display</title>
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
  <h1><center><font style="border:9px solid grey">DISPLAY CONTENTS /\/ CUSTOMER TABLE</font></center></h1>
 <table>
 <tr>
  <th><br>Cust ID<br><br></th>  
  <th><br>Customer Name<br><br></th>
  <th><br>Date of Birth<br><br></th>
  <th><br>Address<br><br></th>
  <th><br>Phone<br><br></th>
  <th><br>Gallery<br><br></th>
  <th><br>Artwork<br><br></th>

  <br><br>
 </tr>
  <?php
// Include database connection
require_once 'connection.php';

  $sql = "SELECT Cu.custid, title, g.gname, fname, lname, dob, address, Co.PHONE from CUSTOMER Cu JOIN contacts Co on Cu.custid=Co.CUSTID join artwork aw on aw.artid=Cu.artworkid join gallery g on g.gid=Cu.gid";

  if ($result = mysqli_query($conn,"$sql")) {
   while($row = $result->fetch_assoc()) {
    // Use htmlspecialchars to prevent XSS attacks
    echo "<tr><td>" . htmlspecialchars($row["custid"]) . "</td><td>" . htmlspecialchars($row["fname"]) . '&nbsp' . htmlspecialchars($row["lname"]) . "</td><td>" . htmlspecialchars($row["dob"]) . "</td><td>" . htmlspecialchars($row["address"]) . "</td><td>" . htmlspecialchars($row["PHONE"]) . "</td><td>" . htmlspecialchars($row["gname"]) . "</td><td>" . htmlspecialchars($row["title"]) . "</td></tr>";
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