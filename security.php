<?php
session_start();
include('admin/database/dbconfig.php');

if($dbconfig) {
    // echo "Database connected";
} else {
    header("Location: database/dbconfig.php");
}
?>