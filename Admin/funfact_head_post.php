<?php
session_start();
require_once('../Database.php');

$sub_head = $_POST['sub_head'];
$white_head = $_POST['white_head'];
$color_head = $_POST['color_head'];
$paragraph1 = $_POST['para1'];
$paragraph2 = $_POST['para2'];

$flag = true; // believing that there are data in our form

//validate form blanks
//always show inputted text (else part)
if (!$sub_head) {
    $_SESSION['sub_err'] = 'Sub Head Requires';
    $flag = false; // data is not here
} else {
    $_SESSION['sub_head_done'] = $sub_head;
}
if (!$white_head) {
    $_SESSION['white_err'] = 'White Head Requires';
    $flag = false; // data is not here
} else {
    $_SESSION['white_head_done'] = $white_head;
}
if (!$color_head) {
    $_SESSION['color_err'] = 'Color Head Requires';
    $flag = false; // data is not here
}
if (!$paragraph1) {
    $_SESSION['para1_err'] = 'Paragraph Requires';
    $flag = false; // data is not here
}
if (!$paragraph2) {
    $_SESSION['para2_err'] = 'Paragraph Requires';
    $flag = false; // data is not here
}



if ($flag) {
    $insert_q = "INSERT INTO funfacts(Sub_head,White_head,Color_head,Paragraph1,Paragraph2)
    VALUES('$sub_head', '$white_head', '$color_head', '$paragraph1', '$paragraph2' )";
    mysqli_query($db, $insert_q);

    unset($_SESSION['sub_head_done']); // data will be removed after inserted
    unset($_SESSION['white_head_done']);
    header('location: funfact_head.php');

}else{
    header('location: funfact_head.php');
}

?>