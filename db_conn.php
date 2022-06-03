<?php

$host = "localhost";
$db_uname = "root";
$db_pass = "ijsf-u_w]Lzsep]z";
$database = "home_service_user";


$conn = new mysqli($host, $db_uname, $db_pass, $database);

if (!$conn){
    echo "Connection Failed";
}
// print_r($row);
?>