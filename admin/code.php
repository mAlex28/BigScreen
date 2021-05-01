<?php

    session_start();
    $con = mysqli_connect("localhost", "root", "", "Big_Screen");

    if (isset($_POST['registerBtn'])) {
        $username = $_POST['username'];
        $email = $_POST['email'];
        $password = $_POST['password'];
        $confpassword = $_POST['confirmpassword'];

        if ($password === $confpassword) {
            $query = "INSERT INTO admin (username, email, password) VALUES ('$username', '$email', '$password')";
            $query_run = mysqli_query($con, $query);
    
            if ($query_run) {
                // echo "Saved";
                $_SESSION['success'] = "Admin Profile Added";
                header('Location: register.php');
            } else {
                // echo "Not saved";
                $_SESSION['status'] = "Admin Profile Not Added";
                header('Location: register.php');
            }

        } else {
            $_SESSION['status'] = "Passwords does not match";
            header('Location: register.php');
        }
    }

    if (isset($_POST['updateBtn'])) {
        $id = $_POST['edit_id'];
        $username = $_POST['edit_username'];
        $email = $_POST['edit_email'];
        $password = $_POST['edit_password'];

        $query = "UPDATE admin SET username = '$username', email = '$email', password = '$password' WHERE id = '$id' ";
        $query_run = mysqli_query($con, $query);

        if ($query_run) {
            $_SESSION['success'] = "Admin Profile Updated";
            header('Location: register.php');
        } else {
            $_SESSION['status'] = "Admin Profile Not Updated";
            header('Location: register.php');
        }
    }

   

?>