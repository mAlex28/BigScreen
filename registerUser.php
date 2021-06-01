<?

include('dbconfig.php');
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
                // $_SESSION['success'] = "<div class='alert alert-primary' role='alert'>Admin Profile Added</div>";
                header('Location: joinus.php');
            } else {
                // echo "Not saved"
                // $_SESSION['status'] = "<div class='alert alert-danger' role='alert'>Admin Profile Not Added</div>";
                header('Location: joinus.php');
            }

        } else {
            $_SESSION['status'] = "Passwords does not match";
            header('Location: register.php');
        }
    }
?>