<!DOCTYPE html>
<html>
<head>
 <title>Stored Gallery</title>
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
    border: 9px solid grey;
    border-radius: 17px;
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
  <h1><center><font style="border:9px solid grey"> STORED PROCEDURE /\/ GALLERY TABLE </font></center></h1>
 <table>
 <tr>
  <th><br>Gallery ID<br><br></th> 
  <th><br>GName<br><br></th> 
  <th><br>Location<br><br></th>
  <br><br>
 </tr>
  <?php
$con = mysqli_connect("localhost", "root", "", "art_gallery");
echo " <b><center>Creating Stored Procedure...</center></b>";

  if ($con->connect_error) {
   die("Connection failed: " . $con->connect_error);
  } 

  $sql = "CREATE procedure display1() SELECT * from GALLERY";
  mysqli_query($con,$sql);
  echo "<b><center>Procedure  Created Successfully.</center></b>";
  echo "<b><center>Calling Stored Procedure!!!</center></b>";
  if ($result = mysqli_query($con,"CALL display1()"))
   {
   
   while($row = $result->fetch_assoc())
    {
    echo "<tr><td>" . $row["gid"]. "</td><td>" . $row["gname"]. "</td><td><br>". $row["location"]. "<br></br></td></tr>";
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