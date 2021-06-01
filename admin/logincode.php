<?php

include('security.php');

if (isset($_POST['loginBtn'])) {
 $emailLogin = $_POST['email'];
 $passLogin = $_POST['password'];

 $query = "SELECT * FROM users WHERE email = '$emailLogin' AND password = '$passLogin'";
 $query_run = mysqli_query($con, $query);
 $usertype = mysqli_fetch_array($query_run);

 if ($usertype['userRole'] == 1) {

     $_SESSION['username'] = $emailLogin;
     header('Location: index.php');

 } else if ($usertype['userRole'] == 2) {

    $_SESSION['username'] = $emailLogin;
    header('Location: ../index.php');

 } else {

     $_SESSION['status'] = "Invalid credentials";
     header('Location: ../joinus.php');

 }

}

?>