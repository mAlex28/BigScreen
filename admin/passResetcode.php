<?php
include('security.php');

function send_password_reset($get_name, $get_email, $token) {
    
}


if (isset($_POST['resetBtn'])) {
    $email = mysqli_real_escape_string($con, $_POST['email']);

    // create a token with random numbers
    $token = md5(rand());

    $check_email = "SELECT email FROM users WHERE email = '$email' LIMIT 1";
    $check_email_run = mysqli_query($con, $check_email);

    if(mysqli_num_rows($check_email_run) > 0) {
        $row = mysqli_fetch_array($check_email_run);
        $get_name =  $row['username'];
        $get_email =  $row['email'];

        $update_token = "UPDATE users SET resetToken = '$token' WHERE email = '$get_email' LIMIT 1 ";
        $update_token_run = mysqli_query($con, $update_token);

        if ($update_token_run) {
            send_password_reset($get_name, $get_email, $token);
            $_SESSION['status'] = "Oops! something went wrong. #1";
            header('Location: forgot-password.php');
            exit(0);

        } else {
            $_SESSION['status'] = "Oops! something went wrong. #1";
            header('Location: forgot-password.php');
            exit(0);
        }

    } else {
        $_SESSION['status'] = "Invalid email";
        header('Location: forgot-password.php');
        exit(0);
    }

}

?>