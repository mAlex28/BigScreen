<?php
  
    include('security.php');

    if (isset($_POST['addCmntBtn'])) {
        $user = $_POST['username'];
        $movie = $_POST['movie'];
        $date = $_POST['date'];
        $comment = $_POST['comment'];

        $query = "INSERT INTO comments (userId,movieId,date,comment) VALUES ('$user', '$movie', '$date', '$comment')";
        $query_run = mysqli_query($con, $query);
        
        if ($query_run) {
            // echo "Saved";
            $_SESSION['success'] = "<div class='alert alert-primary' role='alert'>Comment Added</div>";
            header('Location: comments.php');
        } else {
            // echo "Not saved"
            $_SESSION['status'] = "<div class='alert alert-danger' role='alert'>Comment Not Added</div>";
            header('Location: comments.php');
        }         
        
    }

    if (isset($_POST['deleteBtn'])) {
        $id = $_POST['delete_id'];
      
        $query = "DELETE FROM comments WHERE id = '$id'";
        $query_run = mysqli_query($con, $query);

        if ($query_run) {
            $_SESSION['success'] = "<div class='alert alert-primary' role='alert'>Data deleted</div>";
            header('Location: comments.php');
        } else {
            $_SESSION['status'] = "<div class='alert alert-danger' role='alert'>Unable to delete data</div>";
            header('Location: comments.php');
        }

    }