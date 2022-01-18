<?php
require_once '../Database.php';

 $id = $_GET['id'];

$get_ban_locate_query = "SELECT image_location FROM banners WHERE id=$id";
$from_db = mysqli_query($db, $get_ban_locate_query); //catch

$after_assoc = mysqli_fetch_assoc($from_db); //readable catch

unlink("../".$after_assoc['image_location']); //delete from folder

$delete_q = "DELETE FROM banners WHERE id = $id "; // delete from database
mysqli_query($db, $delete_q);

header('location: banner.php');

?>