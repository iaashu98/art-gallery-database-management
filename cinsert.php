 <?php
    if(isset($_POST['custid']) && isset($_POST['custid']) && isset($_POST['G_ID']) && isset($_POST['fname']) && isset($_POST['lname']) && isset($_POST['dob']) && isset($_POST['artworkid']) && isset($_POST['address']) && isset($_POST['phone'])):

    $custid = $_POST['custid'];
    $gid = $_POST['G_ID'];
    $fname = $_POST['fname'];
    $lname = $_POST['lname'];
    $dob = $_POST['dob'];
    $address = $_POST['address'];
    $phone = $_POST['phone'];
    $artworkid = $_POST['artworkid'];

    $link = new mysqli('localhost','root','','art_gallery');

    if($link->connect_error)
        die('connection error: '.$link->connect_error);

    $sql3 = "INSERT INTO customer(custid, gid, artworkid, fname, lname, dob, address) VALUES('".$custid."', '".$gid."', '".$artworkid."', '".$fname."', '".$lname."', '".$dob."', '".$address."')";
    $sql4="INSERT INTO contacts(CUSTID, PHONE) values('".$custid."', '".$phone."')";
    $result = mysqli_query($link,$sql3);
    $result1=mysqli_query($link,$sql4);

    if($result > 0):
        echo 'Successfully Inserted into Customer table.';
    else:
        echo 'Unable to post';
    endif;

    $link->close();
    die();
    endif; 
?>