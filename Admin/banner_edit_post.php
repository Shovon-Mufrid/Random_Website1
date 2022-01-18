<?php
require_once '../Database.php';

$id = $_POST['id'];
$banner_sub_title = $_POST['banner_sub_title'];
$banner_title = $_POST['banner_title'];
$banner_details = $_POST['banner_details'];

$update_q = "UPDATE banners SET
 banner_sub_title= '$banner_sub_title',
 banner_title= '$banner_title',
 details= '$banner_details'  
 WHERE id= $id ";

mysqli_query($db, $update_q);

if ($_FILES['banner_image']['name']) {
    $uploaded_image_original_name = $_FILES['banner_image']['name'];
    $uploaded_image_original_size = $_FILES['banner_image']['size'];
    if ($uploaded_image_original_size <= 2000000) {  //size of image is less than 2MB
        // to get extension
        $after_explode = explode('.', $uploaded_image_original_name); //separate a file in parts using dot.

        $image_extension = end($after_explode); //last part of $after_explode part
        $allow_extension = array('jpg', 'JPG', 'jpeg', 'JPEG', 'PNG', 'png'); // pdf and others are not included
        //image files validation
        if (in_array($image_extension, $allow_extension)) {

            $get_img_locate_q = "SELECT image_location FROM banners WHERE id=$id";

            $img_locate_from_db = mysqli_query($db,$get_img_locate_q);       
            $after_assoc_img_locate = mysqli_fetch_assoc($img_locate_from_db);
            
             $after_assoc_img_locate['image_location'];
            
             //delete picture from folder when it is selected in form//
            unlink("../".$after_assoc_img_locate['image_location']);

            // mysqli_query($db,  $insert_q);
            // // save file name auto inside location folder:
            // $id_from_db = mysqli_insert_id($db); //$db is already connected with banner
            $image_new_name =  $id . "." . $image_extension; //concat image name with extension
             $save_location = "../uploads/banner/" . $image_new_name;
            move_uploaded_file($_FILES['banner_image']['tmp_name'], $save_location);

                $image_location = "uploads/banner/". $image_new_name;
               $update_img_query = "UPDATE banners SET image_location='$image_location' WHERE id= $id ";

               mysqli_query($db, $update_img_query);
                header('location: banner.php');
        } else {
            echo "no";
        }
    } else {
        echo "Your File Size Is Bigger than 2MB";
    }
} 
//one else is removed
header('location: banner.php');

?>