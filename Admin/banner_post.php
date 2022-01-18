<?php
session_start();
require_once('../Database.php');

//print_r($_FILES);
$banner_sub_title = $_POST['banner_sub_title'];
$banner_title = $_POST['banner_title'];
$banner_details = $_POST['banner_details'];

$uploaded_image_original_name = $_FILES['banner_image']['name'];
$uploaded_image_original_size = $_FILES['banner_image']['size'];

if ($uploaded_image_original_size <= 2000000) {  //size of image is less than 2MB
    // to get extension
    $after_explode = explode('.', $uploaded_image_original_name); //separate a file in parts using dot.

    $image_extension = end($after_explode); //last part of $after_explode part
    $allow_extension = array('jpg', 'JPG', 'jpeg', 'JPEG', 'PNG', 'png'); // pdf and others are not included
    //image files validation
    if (in_array($image_extension, $allow_extension)) {

        $insert_q = "INSERT INTO banners (ban_sub_title, ban_title, details, image_location) 
                        VALUES ('$banner_sub_title','$banner_title', '$banner_details', 'PRIMARY LOCATION' ) ";

        mysqli_query($db,  $insert_q);
        // save file name auto inside location folder:
        $id_from_db = mysqli_insert_id($db); //$db is already connected with banner
        $image_new_name =  $id_from_db . "." . $image_extension; //concat image name with extension
        $save_location = "../uploads/banner/" . $image_new_name;
        move_uploaded_file($_FILES['banner_image']['tmp_name'], $save_location);
        
        $image_location = "uploads/banner/". $image_new_name;
       $update_query = "UPDATE banners SET image_location='$image_location' WHERE id= $id_from_db ";

       mysqli_query($db, $update_query);
        header('location: banner.php');
    } else {
        echo "no";
    }
} else {
    echo "Your File Size Is Bigger than 2MB";
}

?>