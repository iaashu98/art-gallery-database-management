 <?php
    if(isset($_POST['custid']) && isset($_POST['custid']) && isset($_POST['G_ID']) && isset($_POST['fname']) && isset($_POST['lname']) && isset($_POST['dob']) && isset($_POST['address']) && isset($_POST['address']) && isset($_POST['phone'])):

    $custid = $_POST['custid'];
    $gid = $_POST['G_ID'];
    $fname = $_POST['fname'];
    $lname = $_POST['lname'];
    $dob = $_POST['dob'];
    $address = $_POST['address'];
    $phone = $_POST['phone'];
    $artid = $_POST['artid'];

    $link = new mysqli('localhost','root','','art_gallery');

    if($link->connect_error)
        die('connection error: '.$link->connect_error);

    $sql3 = "INSERT INTO customer(custid, gid, artid, fname, lname, dob, address, phone) VALUES('".$custid."', '".$gid."', '".$artid."', '".$fname."', '".$lname."', '".$dob."', '".$address."',  '".$phone."')";

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