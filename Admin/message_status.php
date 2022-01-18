<?php
require_once('../Database.php');

 $id = $_GET['message_id'];

$update_q = "UPDATE guest SET Read_Status = 2 
              WHERE ID= $id ";

mysqli_query($db,$update_q);
header('location: guest_message.php');


?>