 <?php
    if(isset($_POST['E_ID']) && isset($_POST['G_ID']) && isset($_POST['artid']) && isset($_POST['artistid']) && isset($_POST['title']) && isset($_POST['type_of_art']) && isset($_POST['year']) && isset($_POST['price'])):

    $eid = $_POST['E_ID'];
    $gid = $_POST['G_ID'];
    $artid = $_POST['artid'];
    $artistid = $_POST['artistid'];
    $title = $_POST['title'];
    $type_of_art = $_POST['type_of_art'];
    $year = $_POST['year'];
    $price = $_POST['price'];

    $link = new mysqli('localhost','root','','art_gallery');

    if($link->connect_error)
        die('connection error: '.$link->connect_error);

    $sql3 = "INSERT INTO artwork(artid, title, type_of_art, price, eid, gid, artistid, year) VALUES('".$artid."', '".$title."', '".$type_of_art."', '".$price."', '".$eid."', '".$gid."', '".$artistid."', '".$year."')";

    $result = $link->query($sql3); 

    if($result > 0):
        echo 'Successfully inserted into Artwork';
    else:
        echo 'Unable to post';
    endif;

    $link->close();
    die();
    endif; 
?>