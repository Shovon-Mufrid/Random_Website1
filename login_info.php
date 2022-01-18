<?php

//print_r($_POST);
session_start();
require_once("Database.php");


$uname = $_POST['uname'];
$email = $_POST['email'];
$password = $_POST['pass'];




$check_Q = "SELECT COUNT(*) AS total FROM registration 
                where User_Name = '$uname' AND Email= '$email' AND  Password= '$password' ";

$db_login = mysqli_query($db, $check_Q);

$after_assoc = mysqli_fetch_assoc($db_login);

//print_r($after_assoc);
// user_status is used to keep others from directly enter into webpage from url
if($after_assoc['total'] == 1){
    $_SESSION['email'] = $email;
    $_SESSION['user_status'] = 'yes';  

    header('location: Admin/dashboard.php');
}

else {
    $_SESSION['login_err'] = "Login failed. Please Register of input correct info";
    header('location: Login.php');
}

    

?>