<?php

 session_start(); 

require_once("Database.php");



$pname = filter_var($_POST['name'], FILTER_SANITIZE_STRING);
$uname = $_POST['uname'];
$email = filter_var($_POST['email'], FILTER_SANITIZE_EMAIL);
$phone = $_POST['phone'];
$password = $_POST['pass'];

//password validation
$valid_email =  filter_var($email, FILTER_VALIDATE_EMAIL);
// $pass_cap = preg_match('@[A-Z]@', $password);
$pass_sml = preg_match('@[a-z]@', $password);
$pass_num = preg_match('@[0-9]@', $password);
// $pattern = '/[\'\/~`\!@#\$%\^&\*\(\)_\-\+=\{\}\[\]\|;:"\<\>,\.\?\\\]/';
// $pass_char = preg_match($pattern, $password);

//cant input more than one same email and put them in new query
//encrypt pass in database
//password modification
//no unauthorized mail 

if ($valid_email) {
    // if (strlen($password) > 6 && $pass_cap == 1 && $pass_sml == 1 && $pass_num == 1 && $pass_char == 1) {
    if (strlen($password) > 6 && $pass_sml == 1 && $pass_num == 1 ) {
        // $encrypt_pass = md5($password); 
        $checking_query = "SELECT COUNT(*) AS Total FROM registration where Email = '$valid_email' ";
        $db_result = mysqli_query($db, $checking_query); 
        $after_assoc = mysqli_fetch_assoc($db_result);
      
        if($after_assoc['Total'] == 0 ){
            $query = "INSERT INTO registration(Name,User_Name,Email,Phone,Password)
                    VALUES('$pname', '$uname', '$email', '$phone', '$password' )";                      
                
                mysqli_query($db, $query);

                $_SESSION['success_msg'] = "Registration Complete";
                header('location: Registration.php');
                
        }
        else{
            $_SESSION['err_msg'] = "already registered";
            header('location: Registration.php');
        }

    
    } else {
    $_SESSION['err_msg'] = "Password must have some problems";
    header('location: Registration.php');
    
    }
} else {
    $_SESSION['err_msg'] = "Invalid Mail";
    header('location: Registration.php');
}


echo "<br>";
?>