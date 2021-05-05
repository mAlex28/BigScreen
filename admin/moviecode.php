<?php
  
  include('security.php');

  if (isset($_POST['addMovieBtn'])) {
    $moviename = $_POST['moviename'];
    $year = $_POST['movieyear'];
    $imdb = $_POST['imdb'];
    $rating = $_POST['rating'];
    $category = $_POST['category'];
    $description = $_POST['moviedescription'];
    $poster = $_FILES["movieposter"]['name'];

    if (file_exists("upload/" . $_FILES["movieposter"]["name"])){
        $store =  $_FILES["movieposter"]["name"];
        $_SESSION['status'] = "<div class='alert alert-danger' role='alert'>Image already exists '.$store.'</div>";
        header('Location: movies.php');
    } else {
        $query = "INSERT INTO movies (`mname`, `myear`, `imdb`, `ratings`, `category`, `description`, `poster`) VALUES ('$moviename', '$year', '$imdb', '$rating', '$category', '$description', '$poster')";
        $query_run = mysqli_query($con, $query);
        
        if ($query_run) {
            move_uploaded_file($_FILES["movieposter"]["tmp_name"], "upload/".$_FILES["movieposter"]["name"]);
            // echo "Saved";
            $_SESSION['success'] = "<div class='alert alert-primary' role='alert'>Movie Added</div>";
            header('Location: movies.php');
        } else {
            // echo "Not saved"
            $_SESSION['status'] = "<div class='alert alert-danger' role='alert'>Movie Not Added</div>";
            header('Location: movies.php');
    }     
        
    }
}

if (isset($_POST['deleteBtn'])) {
    $id = $_POST['delete_id'];

    $query = "DELETE FROM movies WHERE mid = '$id'";
    $query_run = mysqli_query($con, $query);

    if ($query_run) {
        unlink($filename);
        $_SESSION['success'] = "<div class='alert alert-primary' role='alert'>Data deleted</div>";
        header('Location: movies.php');
    } else {
        $_SESSION['status'] = "<div class='alert alert-danger' role='alert'>Unable to delete data</div>";
        header('Location: movies.php');
    }

   }


   if (isset($_POST['updateBtn'])) {
    $edit_id = $_POST['edit_id'];
    $edit_moviename = $_POST['edit_moviename'];
    $edit_year = $_POST['edit_movieyear'];
    $edit_imdb = $_POST['edit_imdb'];
    $edit_rating = $_POST['edit_rating'];
    $edit_category = $_POST['edit_category'];
    $edit_description = $_POST['edit_description'];
    $edit_poster = $_FILES["movieposter"]['name'];

    $query = "UPDATE movies SET mname = '$edit_moviename', myear = '$edit_year', imdb = '$edit_imdb', ratings = '$edit_rating', category = '$edit_category', description = '$edit_description', poster = '$edit_poster' WHERE mid = '$edit_id' ";
    $query_run = mysqli_query($con, $query);

    if ($query_run) {
        move_uploaded_file($_FILES["movieposter"]["tmp_name"], "upload/".$_FILES["movieposter"]["name"]);
        $_SESSION['success'] = "<div class='alert alert-primary' role='alert'>Movie updated</div>";
        header('Location: movies.php');
    } else {
        $_SESSION['status'] = "<div class='alert alert-primary' role='alert'>Movie not updated</div>";
        header('Location: movies.php');
    }
}
  ?>