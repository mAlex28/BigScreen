<?php

include('dbconfig.php');

if (isset($_POST['subBtn'])) {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $subj = $_POST['subj'];
    $msg = $_POST['msg'];

 
        $query = "INSERT INTO contacts (c_name, c_email, subject, message) VALUES ('$name', '$email', '$subj', '$msg')";
        $query_run = mysqli_query($con, $query);
        
        if ($query_run) {
            // echo "Saved";
            $_SESSION['success'] = "<div class='alert alert-primary' role='alert'>Sent</div>";
            header('Location: contact.php');
        } else {
            $_SESSION['status'] = "<div class='alert alert-danger' role='alert'>Not Sent</div>";
            header('Location: contact.php');
        }         
    
}
