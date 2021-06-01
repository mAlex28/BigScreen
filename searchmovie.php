<?php

include('dbconfig.php');

if (isset($_POST['searchBtn'])) {
    $name = $_POST['name'];
        $query = "SELECT * FROM movies WHERE mname = $name";
        $query_run = mysqli_query($con, $query);
        
        if ($query_run) {
            // echo "Saved";
            $_SESSION['success'] = "<div class='alert alert-primary' role='alert'>Sent</div>";
            header('Location: review.php?movie=$name');
        } else {
            $_SESSION['status'] = "<div class='alert alert-danger' role='alert'>Not Sent</div>";
            header('Location: review.php');
        }         
    
}
