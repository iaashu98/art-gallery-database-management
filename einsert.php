 <?php
    if(isset($_POST['E_ID']) && isset($_POST['G_ID']) && isset($_POST['startdate']) && isset($_POST['enddate'])):
    $eid = $_POST['E_ID'];
    $gid = $_POST['G_ID'];
    $startdate = $_POST['startdate'];
    $enddate = $_POST['enddate'];

    $link = new mysqli('localhost','root','','art_gallery');

    if($link->connect_error)
        die('connection error: '.$link->connect_error);

    $sql3 = "INSERT INTO EXHIBITION(eid, gid, startdate, enddate) VALUES('".$eid."', '".$gid."', '".$startdate."', '".$enddate."')";

      

    $result = $link->query($sql3); 

    if($result > 0):
        echo 'Successfully Inserted into EXHIBITION table.';
    else:
        echo 'Unable to post';
    endif;

    $link->close();
    die();
    endif; 
?>
