<?php
        session_start();
        require_once('../Database.php');

        // print_r($_POST);

        $guest_name = $_POST['g_name'];
        $guest_email = $_POST['g_email'];
        $guest_message = $_POST['g_message'];

       $query = "INSERT INTO guest(Guest_Name,Guest_Email,Guest_Message)
        VALUES('$guest_name', '$guest_email', '$guest_message')";

        mysqli_query($db,$query);
        
        header('location: ../index.php');
?>