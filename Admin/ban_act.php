<?php
require_once('../Database.php');

 $id = $_GET['id']; // if we send data by link, we use GET method

// die(); to not calling anything below
$update_q = "UPDATE banners SET read_status = 1 
              WHERE id= $id ";

mysqli_query($db,$update_q);
header('location: banner.php');


?>