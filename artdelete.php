<html>
<head>
    <title>Delete from Artwork</title>
</head>
<style>
b{
    font-size: 30px;
    font-family: 'Arial';
    padding: 27px 62px;
}
input[type=text] {
    width: 120px;
    font-weight: bold;
    box-sizing: border-box;
    border: 2px solid #ccc;
    border-radius: 9px;
    font-size: 26px;
    background-color: white;
    background-position: 10px 10px; 
    background-repeat: no-repeat;
    padding: 27px 20px 22px 10px;
    -webkit-transition: width 0.4s ease-in-out;
    transition: width 0.4s ease-in-out;
}
input[type=text]:focus {
    width: 50%;
}
div{
	font-family: 'Verdana';
	font-size: 35px;
	font-weight:bold;
	margin-left:25px;
	margin-top: 35px;
}
.btn{
	background-color: forestgreen;
    color: white;
    padding: 16px 10px;
    margin: 8px 20px 20px 50px;
    border-radius: 24px;
    cursor: pointer;
    width: 10%;
    opacity: 0.7;
    align-content: center;
    font-family: "verdana";
    font-weight: bold;
    -webkit-box-shadow: 0px 6px 0px green;
    -moz-box-shadow: 0px 6px 0px green;
    box-shadow: 0px 6px 0px green;
    -webkit-transition: all .1s ease-in-out;
    -moz-transition: all .2s ease-in-out;
    transition: all .2s ease-in-out;
    -webkit-transform: translate(0, 5px) rotateX(25deg);
    -moz-transform: translate(0, 4px);
    transform: translate(0, 4px)
    }
.btn:hover 
{
    opacity: 1;
    background-color:forestgreen;
}

</style>
<body style="background-color: lavenderblush">
    <h1><center><font style="border:9px solid grey" face="arial">DELETE FROM ARTWORK TABLE </font></center></h1>
	<form action="artdelete.php" method="POST">
		<div>Enter Artwork ID:<input type="text" name="artid"><br></div>
		<br><br>
		<button type="submit" value ="Delete" class="btn">DELETE</button>
        <button type="reset" value ="Reset" class="btn">RESET</button>
	</form>
 <?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "art_gallery";


$con = new mysqli($servername, $username, $password, $dbname);

if ($con->connect_error) 
{
    die("Connection failed: " . $con->connect_error);
}
if ($_SERVER["REQUEST_METHOD"] == "POST")
{
 $n=$_POST['artid'];
if($n!='')
$sql3 = "SELECT * FROM artwork WHERE artid ='$n'";
$result =mysqli_query($con,$sql3);

  if(mysqli_num_rows($result)>0)
  { 
    $sql = "SELECT * FROM artwork WHERE artid ='$n'";
    mysqli_query($con,$sql);
      echo "<b>Record with Art ID = $n is deleted successfully.<b>";
  }
   else
    {
      echo "<b>!!!Error in Deleting Record!!!<br> Record '$n' was not found in database.<b>" .mysqli_error($con);
    }
}
$con->close();
?> 
</body>
</html>