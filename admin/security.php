<?php
session_start();

// include('dbconfig.php');

// if ($con) {

// } else {
//     header('Location: dbconfig.php');
// }

if (!$_SESSION['username']) {
    header('Location: login.php');
}
?>