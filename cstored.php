<!DOCTYPE html>
<html>
<head>
 <title>Stored Customer</title>
 <style>
  b{
    font-size: 28px;
    font-family: 'Arial';
    padding: 1px;
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
   background-color: #54C571;
   color: snow;
   border-radius: 32px;
  }
  h1{
    font-family: "Arial";
    font-size: 50px;
    border: 9px solid #736AFF;
    border-radius: 17px;
     color: black;
  }
  td{
    padding: 12px;
    border-radius: 14px;
  }
  tr:nth-child(even) {background-color: #f2f2f2; 
    border-radius: 14px;}
 </style>
</head>
<body style="background-color: #EBF4FA">
  <h1><center><font style="border:9px solid #736AFF"> STORED PROCEDURE /\/ CUSTOMER TABLE </font></center></h1>
 <table>
 <tr>
 <th><br>Cust ID<br><br></th> 
  <th><br>Gallery ID<br><br></th> 
  <th><br>First Name<br><br></th>
  <th><br>Last Name<br><br></th>
  <th><br>Date of Birth<br><br></th>
  <th><br>Address<br><br></th>
  <th><br>Age<br><br></th>
  <br><br>
 </tr>
  <?php
$con = mysqli_connect("localhost", "root", "", "art_gallery");
echo " <b><center>Creating Stored Procedure...</center></b>";

  if ($con->connect_error) {
   die("Connection failed: " . $con->connect_error);
  } 

  $sql = "CREATE PROCEDURE GetAge() SELECT *, year(current_date())-year(dob) as age from CUSTOMER";
  mysqli_query($con,$sql);
  echo "<b><center>Procedure  Created Successfully.</center></b>";
  echo "<b><center>Calling Stored Procedure!!!</center></b>";
  if ($result = mysqli_query($con,"CALL GetAge()"))
   {
   
   while($row = $result->fetch_assoc())
    {
    echo "<tr><td>" . $row["custid"]. "</td><td>" . $row["gid"]. "</td><td>" . $row["fname"]. "</td><td>" . $row["lname"]. "</td><td>" . $row["dob"]. "</td><td>" . $row["address"]. "</td><td>". $row["age"]. "</td></tr>";
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