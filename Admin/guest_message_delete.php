<?php
require_once '../Database.php';

 $id = $_GET['message_id'];

$delete_q = "DELETE FROM guest WHERE ID = $id "; // delete from database
mysqli_query($db, $delete_q);

header('location: guest_message.php');

?>