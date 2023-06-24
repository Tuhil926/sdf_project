<?php
$server ="localhost";
$username ="root";
$password="";
$database="Details";

// mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);
$connect = mysqli_connect($server , $username , $password , $database);
$connect->set_charset('utf8mb4');
if (!$connect)
{
    echo "failure";
}



?>