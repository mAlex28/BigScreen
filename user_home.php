<?php
    session_start();
    if (!isset($_SESSION['userlogin'])) {
        header("Location: login.php");
    }
    
    if (isset($_GET['logout'])) {
        session_destroy();
        unset($_SESSION);
        header("Location: login.php");
    }
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home</title>
</head>
<body>
    <h1> Welcome user </h1>
    
    <a href="user_home.php?logout=true">Logout</a>
</body>
</html>