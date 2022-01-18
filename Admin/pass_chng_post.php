<?php
session_start();
require_once('../Database.php');

// print_r($_POST);
$login_email= $_SESSION['email'];
$password = $_POST['new_pass'];

if ($_POST['pre_pass'] == NULL || $_POST['new_pass'] == NULL || $_POST['con_pass'] == NULL) {
    $_SESSION['pass_change_error'] = 'Password field cannot be empty';
    header('location: pass_change.php');
} else {
    if (strlen($_POST['pre_pass']) > 6 && strlen($_POST['new_pass']) > 6 && strlen($_POST['con_pass']) > 6) {
        $pass_sml = preg_match('@[a-z]@', $password);
        $pass_num = preg_match('@[0-9]@', $password);

        if ($pass_sml == 1 && $pass_num == 1) {

            if ($_POST['new_pass'] == $_POST['con_pass']) {

                if ($_POST['new_pass'] != $_POST['pre_pass']) {
                    $old_db_pass =  $_POST['pre_pass'];  
                    // password inserted inside db tables & can be encrypted here with md5
                    
                    $check_query = "SELECT COUNT(*) AS Total_User FROM registration
                     WHERE Email = '$login_email' AND Password = '$old_db_pass' ";
                        
                     $db_result = mysqli_query($db, $check_query);
                     $after_assoc = mysqli_fetch_assoc($db_result);
                     if($after_assoc['Total_User'] == 1 ) {
                        $new_password =  $_POST['new_pass']; //can be encrypted with md5()
                        $update_query = "UPDATE registration SET 
                        Password='$new_password'
                        WHERE Email= '$login_email' ";
                    
                        mysqli_query($db, $update_query);
                        $_SESSION['pass_change_success'] = 'Password Change Successful';
                        header('location: profile.php');

                     } else {
                        $_SESSION['pass_change_error'] = 'Previous Password is not correct';
                        header('location: pass_change.php');
       
                     }

                } else {
                    $_SESSION['pass_change_error'] = 'New password and Previous password can not be same';
                    header('location: pass_change.php');
                }
            } else {
                $_SESSION['pass_change_error'] = 'New password and Confirm password are not same';
                header('location: pass_change.php');
            }
        } else {
            $_SESSION['pass_change_error'] = 'Password must have 1 small letter and 1 digit';
            header('location: pass_change.php');
        }
    } else {
        $_SESSION['pass_change_error'] = 'Password field must have 6 characters';
        header('location: pass_change.php');
    }
}
