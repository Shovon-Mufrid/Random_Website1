<?php

$db_host = 'localhost';
$db_uname = 'root';
$db_pass = '';
$db_name = 'web course';

$db = mysqli_connect($db_host, $db_uname, $db_pass, $db_name);

function db_connect(){
    $db_host = 'localhost';
    $db_uname = 'root';
    $db_pass = '';
    $db_name = 'web course';   
    return mysqli_connect($db_host, $db_uname, $db_pass, $db_name);
}

function get_all($table_name){
    $get_query = "SELECT * FROM $table_name ";
    return mysqli_query(db_connect(),$get_query);
}

function get_all_active($table_name,$status = 1,$order = 'ASC'){
    $get_all_active_query = "SELECT * FROM $table_name 
                            WHERE active_status = $status ORDER BY id $order";
    return mysqli_query(db_connect(),$get_all_active_query);
}


?>