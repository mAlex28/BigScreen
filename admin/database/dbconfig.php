<link href="../css/sb-admin-2.min.css" rel="stylesheet">
<?php

// $server_name = "localhost";
// $db_username = "root";
// $db_password = "";
// $db_name = "Big_Screen";

// $con = mysqli_connect($server_name,$db_username,$db_password);
// $dbconfig = mysqli_select_db($con,$db_name);


//Get Heroku ClearDB connection information
$cleardb_url = parse_url(getenv("mysql://b32ac7d0290999:73ab2899@eu-cdbr-west-01.cleardb.com/heroku_8734def0dbf3177?reconnect=true"));
$cleardb_server = $cleardb_url["eu-cdbr-west-01.cleardb.com"];
$cleardb_username = $cleardb_url["b32ac7d0290999"];
$cleardb_password = $cleardb_url["73ab2899"];
$cleardb_db = substr($cleardb_url["heroku_8734def0dbf3177"], 1);
$active_group = 'default';
$query_builder = TRUE;
// Connect to DB
$con = mysqli_connect($cleardb_server, $cleardb_username, $cleardb_password);
$dbconfig = mysqli_select_db($con, $cleardb_db);

if ($dbconfig) {
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