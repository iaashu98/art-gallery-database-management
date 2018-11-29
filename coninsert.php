 <?php
    if(isset($_POST['custid']) && isset($_POST['phone'])):
    $custid = $_POST['custid'];
    $phone = $_POST['phone'];

    $link = new mysqli('localhost','root','','art_gallery');

    if($link->connect_error)
        die('connection error: '.$link->connect_error);

    $sql3 = "INSERT INTO CONTACTS(custid, phone) VALUES('".$custid."', '".$phone."')";

      

    $result = $link->query($sql3); 

    if($result > 0):
        echo 'Successfully Inserted into Contacts table.';
    else:
        echo 'Unable to post';
    endif;

    $link->close();
    die();
    endif; 
?>
