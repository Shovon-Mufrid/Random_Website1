<?php
require_once '../Database.php';

$id = $_GET['id'];

$update_q = "UPDATE service_heads SET active_status = 2
              WHERE id != $id ";
              //if an id is checked, deactivate others
              
$update_q2 = "UPDATE service_heads SET active_status = 1
              WHERE id = $id ";

mysqli_query($db, $update_q);
mysqli_query($db, $update_q2);
header('location: service_head.php');

?>