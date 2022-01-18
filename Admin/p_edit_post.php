<?php
session_start();
require_once('../Database.php');
//$login_email= $_SESSION['email'];
// print_r($_POST);

if ($_POST['name'] == NULL || $_POST['phone'] == NULL) {
    $_SESSION['profile_err'] = 'All field Required';
    header('location: p_edit.php');
} else {
    $name = $_POST['name'];
    $phone = $_POST['phone'];
     $email = $_POST['email'];

    $update_query = "UPDATE registration SET 
    Name='$name',
    Phone='$phone' 
    WHERE Email= '$email' ";

    mysqli_query($db, $update_query);
    header('location: profile.php');

    
}
?>