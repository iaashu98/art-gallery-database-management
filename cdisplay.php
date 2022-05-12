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
$con = mysqli_connect("localhost", "root", "", "art_gallery");

  if ($con->connect_error) {
   die("Connection failed: " . $con->connect_error);
  } 

  $sql = "SELECT Cu.custid, title, g.gname, fname, lname, dob, address, Co.PHONE from CUSTOMER Cu JOIN contacts Co on Cu.custid=Co.CUSTID join artwork aw on aw.artid=Cu.artworkid join gallery g on g.gid=Cu.gid";
  mysqli_query($con,$sql);

  if ($result = mysqli_query($con,"$sql"))
   {
   
   while($row = $result->fetch_assoc())
    {
    echo "<tr><td>" . $row["custid"]. "</td><td>" . $row["fname"] . '&nbsp' . $row["lname"]. "</td><td>" . $row["dob"]. "</td><td>" . $row["address"]. "</td><td>" . $row["PHONE"]. "</td><td>" . $row["gname"]."</td><td>" . $row["title"]. "</td></tr>";
    }
    echo "</table>";
    }
else 
  { 
    echo "0 results"; 
  }
$con->close();
?>
</table>
</body>
</html>