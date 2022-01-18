<?php
require_once('../Database.php');

$black_head = $_POST['black_head'];
$color_head = $_POST['color_head'];
$sub_head = $_POST['sub_head'];


$insert_q = "INSERT INTO service_heads(black_head,color_head,sub_head)
             VALUES('$black_head', '$color_head', '$sub_head')"; 

    mysqli_query($db, $insert_q );

    header('location: service_head.php');


?>