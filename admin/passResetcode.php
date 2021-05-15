<?php
include('security.php');

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

require '../vendor/autoload.php';

function send_password_reset($get_name, $get_email, $token)
{
    $mail = new PHPMailer(true);

    // $mail->SMTPDebug = SMTP::DEBUG_SERVER;                      //Enable verbose debug output
    $mail->isSMTP();                                            //Send using SMTP
    $mail->Host       = 'smtp.gmail.com';                     //Set the SMTP server to send through
    $mail->SMTPAuth   = true;
    //Enable SMTP authentication
    $mail->Username   = 'alexthegeek2001@gmail.com';                     //SMTP username
    $mail->Password   = 'notfor123normies#';                               //SMTP password
    $mail->SMTPSecure = 'tls';         //Enable TLS encryption; `PHPMailer::ENCRYPTION_SMTPS` encouraged
    $mail->Port       = 587;                                    //TCP port to connect to, use 465 for `PHPMailer::ENCRYPTION_SMTPS` above

    //Recipients
    $mail->setFrom('alexthegeek2001@gmail.com', $get_name);
    $mail->addAddress($get_email);     //Add a recipient

    //Content
    $mail->isHTML(true);                                  //Set email format to HTML
    $mail->Subject = 'Reset password link';

    $email_template = "
        <h3>Please click the link below to reset your password. If you haven't requested a password reset please ignore the message</h3>
        <br><br>
        <a href='http://localhost/BigScreen/admin/password-change.php?token=$token&email=$get_email'> Reset Password</a>
    ";

    $mail->Body = $email_template;
    $mail->send();
}


if (isset($_POST['resetBtn'])) {
    $email = mysqli_real_escape_string($con, $_POST['email']);

    // create a token with random numbers
    $token = md5(rand());

    $check_email = "SELECT email FROM users WHERE email = '$email' LIMIT 1";
    $check_email_run = mysqli_query($con, $check_email);

    if (mysqli_num_rows($check_email_run) > 0) {
        $row = mysqli_fetch_array($check_email_run);
        $get_name =  $row['username'];
        $get_email =  $row['email'];

        $update_token = "UPDATE users SET resetToken = '$token' WHERE email = '$get_email' LIMIT 1";
        $update_token_run = mysqli_query($con, $update_token);

        if ($update_token_run) {
            send_password_reset($get_name, $get_email, $token);
            $_SESSION['status'] = "<div class='alert alert-success' role='alert'>Reset link has been sent to your email account</div>";
            header('Location: forgot-password.php');
            exit(0);
        } else {
            $_SESSION['status'] = "<div class='alert alert-danger' role='alert'>Oops! something went wrong. #1 </div>";
            header('Location: forgot-password.php');
            exit(0);
        }
    } else {
        $_SESSION['status'] = "<div class='alert alert-danger' role='alert'>Invalid email </div>";
        header('Location: forgot-password.php');
        exit(0);
    }
}

if (isset($_POST['resetConfBtn'])) {
    $email = mysqli_real_escape_string($con, $_POST['email']);
    $newpass = mysqli_real_escape_string($con, $_POST['newpass']);
    $confpass = mysqli_real_escape_string($con, $_POST['confpass']);
    $token = mysqli_real_escape_string($con, $_POST['passtoken']);

    if (!empty($token)) {
        if (!empty($email) && !empty($newpass) && !empty($confpass)) {
            // check if the token is valid
            $chk_token = "SELECT resetToken FROM users WHERE resetToken ='$token' LIMIT 1";
            $chk_token_run = mysqli_query($con, $chk_token);

            if (mysqli_num_rows($chk_token_run) > 0) {

                if ($newpass == $confpass) {
                    $update_pass = "UPDATE users SET password='$newpass' WHERE resetToken='$token' LIMIT 1";
                    $update_pass_run = mysqli_query($con, $update_pass);

                    if ($update_pass_run) {
                        $new_token = md5(rand());
                        $update_token_new = "UPDATE users SET resetToken='$new_token' WHERE resetToken='$token' LIMIT 1";
                        $update_token_new_run = mysqli_query($con, $update_token_new);

                        $_SESSION['status'] = "<div class='alert alert-success' role='alert'>Passwords Reset Successfull. Please Login</div>";
                        header("Location: login.php");
                        exit(0);
                    } else {
                        $_SESSION['status'] = "<div class='alert alert-danger' role='alert'>Something Went wrong</div>";
                        header("Location: password-change.php?token=$token&email=$email");
                        exit(0);
                    }
                } else {
                    $_SESSION['status'] = "<div class='alert alert-danger' role='alert'>Passwords doesn't match</div>";
                    header("Location: password-change.php?token=$token&email=$email");
                    exit(0);
                }
            } else {
                $_SESSION['status'] = "<div class='alert alert-danger' role='alert'>Invalid Token</div>";
                header("Location: password-change.php?token=$token&email=$email");
                exit(0);
            }
        } else {
            $_SESSION['status'] = "<div class='alert alert-danger' role='alert'>All Fields are requred</div>";
            header("Location: password-change.php?token=$token&email=$email");
            exit(0);
        }
    } else {
        $_SESSION['status'] = "<div class='alert alert-danger' role='alert'>No Token Available</div>";
        header('Location: password-change.php');
        exit(0);
    }
}
