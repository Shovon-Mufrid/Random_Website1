<?php
session_start();
require_once('../Database.php');

$digit = $_POST['digit'];
$title = $_POST['title'];


$flag = true; // believing that there are data in our form

//validate form blanks
if(!$digit){
    $_SESSION['digit_err'] = 'Digit Requires';
    $flag = false; // data is not here
}
if(!$title){
    $_SESSION['title_err'] = 'Title Requires';
    $flag = false; // data is not here
}

//always show inputted text
if($flag){
$_SESSION['digit_done'] = $digit;

}
else{
    header('location: funfact_items.php');
}
if($flag){
$_SESSION['title_done'] = $title;
}
else{
    header('location: funfact_items.php');
}

 $insert_q = "INSERT INTO funfacts_items(digit,title)
             VALUES('$digit', '$title' )"; 
     mysqli_query($db, $insert_q );
     header('location: funfact_items.php');
    


?>