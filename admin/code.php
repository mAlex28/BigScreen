<?php

    session_start();
    $con = mysqli_connect("localhost", "root", "", "Big_Screen");

    if (isset($_POST['registerBtn'])) {
        $username = $_POST['username'];
        $email = $_POST['email'];
        $password = $_POST['password'];
        $confpassword = $_POST['confirmpassword'];

        if ($password === $confpassword) {
            $query = "INSERT INTO admin (username, email, password) VALUES ('$username', '$email', ''$password)";
            $query_run = mysqli_query($con, $query);
    
            if ($query_run) {
                // echo "Saved";
                $_SESSION['success'] = "Admin Profile Added";
                header('Location: register.php');
            } else {
                // echo "Not saved";
                $_SESSION['statu'] = "Admin Profile Not Added";
                header('Location: register.php');
            }

        } else {
            $_SESSION['statu'] = "Passwords does not match";
            header('Location: register.php');
        }
    }
?>