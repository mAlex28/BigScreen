<?php

include('security.php');
include('dbconfig.php');

if (isset($_POST['loginBtn'])) {
 $emailLogin = $_POST['email'];
 $passLogin = $_POST['password'];

 $query = "SELECT * FROM admin WHERE email = '$emailLogin' AND password = '$passLogin'";
 $query_run = mysqli_query($con, $query);

 if (mysqli_fetch_array($query_run)) {
     $_SESSION['username'] = $emailLogin;
     header('Location: index.php');
 } else {
     $_SESSION['status'] = "Invalid credentials";
     header('Location: login.php');
 }

}

?>