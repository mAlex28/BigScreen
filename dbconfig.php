<?php
$server_name = "localhost";
$db_username = "root";
$db_password = "";
$db_name = "Big_Screen";

$con = mysqli_connect($server_name,$db_username,$db_password);
$dbconfig = mysqli_select_db($con,$db_name);

if($dbconfig) {
    // echo "Database connected";
} else {
    echo 'connection failed';
}

?>