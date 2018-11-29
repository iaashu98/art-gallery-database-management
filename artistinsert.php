 <?php
    if(isset($_POST['artistid']) && isset($_POST['G_ID']) && isset($_POST['custid']) && isset($_POST['fname1']) && isset($_POST['lname1']) && isset($_POST['E_ID']) && isset($_POST['birthplace']) && isset($_POST['style'])):

    $artistid = $_POST['artistid'];
    $gid = $_POST['G_ID'];
    $fname1 = $_POST['fname1'];
    $lname1 = $_POST['lname1'];
    $eid = $_POST['E_ID'];
    $birthplace = $_POST['birthplace'];
    $style = $_POST['style'];
    $custid = $_POST['custid'];

    $link = new mysqli('localhost','root','','art_gallery');

    if($link->connect_error)
        die('connection error: '.$link->connect_error);

    $sql3 = "INSERT INTO ARTIST(artistid, gid, custid, eid, fname1, lname1, birthplace, style) VALUES('".$artistid."', '".$gid."', '".$custid."', '".$eid."', '".$fname1."', '".$lname1."', '".$birthplace."',  '".$style."')";

    $result = $link->query($sql3); 

    if($result > 0):
        echo 'Successfully posted.' ;
    else:
        echo 'Unable to post';
    endif;

    $link->close();
    die();
    endif; 
?>