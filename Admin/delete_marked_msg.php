<?php
require_once '../Database.php';
// print_r($_POST)

foreach($_POST['check'] as $key => $check){
    
    $delete_q = "DELETE FROM guest WHERE ID = $key "; // delete from database
mysqli_query($db, $delete_q);

header('location: guest_message.php');
}





?>