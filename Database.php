<?php

$db_host = 'localhost';
$db_uname = 'root';
$db_pass = '';
$db_name = 'web course';

$db = mysqli_connect($db_host, $db_uname, $db_pass, $db_name);

function shogreetings(){
    return "Hello I am Shovon";
}


?>