<?php
  
  include('security.php');
    $con = mysqli_connect("localhost", "root", "", "Big_Screen");

    if (isset($_POST['registerBtn'])) {
        $username = $_POST['username'];
        $email = $_POST['email'];
        $password = $_POST['password'];
        $confpassword = $_POST['confirmpassword'];
        $userRole = $_POST['userRole'];

        if ($password === $confpassword) {
            $query = "INSERT INTO users (username, email, password, userRole) VALUES ('$username', '$email', '$password', '$userRole')";
            $query_run = mysqli_query($con, $query);
    
            if ($query_run) {
                // echo "Saved";
                $_SESSION['success'] = "<div class='alert alert-primary' role='alert'>Admin Profile Added</div>";
                header('Location: register.php');
            } else {
                // echo "Not saved"
                $_SESSION['status'] = "<div class='alert alert-danger' role='alert'>Admin Profile Not Added</div>";
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

        $query = "UPDATE users SET username = '$username', email = '$email', password = '$password' WHERE id = '$id' ";
        $query_run = mysqli_query($con, $query);

        if ($query_run) {
            $_SESSION['success'] = "Admin Profile Updated";
            header('Location: register.php');
        } else {
            $_SESSION['status'] = "Admin Profile Not Updated";
            header('Location: register.php');
        }
    }

   if (isset($_POST['deleteBtn'])) {
    $id = $_POST['delete_id'];

    $query = "DELETE FROM users WHERE id = '$id'";
    $query_run = mysqli_query($con, $query);

    if ($query_run) {
        $_SESSION['success'] = "<div class='alert alert-primary' role='alert'>Data deleted</div>";
        header('Location: register.php');
    } else {
        $_SESSION['status'] = "<div class='alert alert-danger' role='alert'>Unable to delete data</div>";
        header('Location: register.php');
    }

   }

   if (isset($_POST['deleteBtnU'])) {
    $id = $_POST['delete_id'];

    $query = "DELETE FROM users WHERE id = '$id'";
    $query_run = mysqli_query($con, $query);

    if ($query_run) {
        $_SESSION['success'] = "<div class='alert alert-primary' role='alert'>Data deleted</div>";
        header('Location: users.php');
    } else {
        $_SESSION['status'] = "<div class='alert alert-danger' role='alert'>Unable to delete data</div>";
        header('Location: users.php');
    }

   }
