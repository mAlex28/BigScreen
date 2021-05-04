<link href="../css/sb-admin-2.min.css" rel="stylesheet">
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
    echo '
    <div class="container-fluid">
    <div class="text-center align-items-center justify-content-center"">
        <p class="lead text-gray-800 mb-5">Connection Failed</p>
        <p class="text-gray-500 mb-0">Please check your network connection</p>
        <a href="#">:(</a>
    </div>
    
    </div>
    ';
}

?>