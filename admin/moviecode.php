<?php
  
    include('security.php');

    if (isset($_POST['search_data'])) {
        $id = $_POST['mid']; 
        $visible = $_POST['visible'];

        $query = "UPDATE movies SET visible = '$visible' WHERE mid = $id";
        $query_run = mysqli_query($con, $query);
    }

    if (isset($_POST['deleteMultipleData'])) {
        $id = "1"; 
        
        $query = "DELETE FROM movies WHERE visible = '$id'";
        $query_run = mysqli_query($con, $query);

        if ($query_run) {
            $_SESSION['success'] = "<div class='alert alert-primary' role='alert'>Data deleted</div>";
            header('Location: movies.php');
        } else {
            $_SESSION['status'] = "<div class='alert alert-danger' role='alert'>Unable to delete data</div>";
            header('Location: movies.php');
        }
    }


    if (isset($_POST['addMovieBtn'])) {
        $moviename = $_POST['moviename'];
        $year = $_POST['movieyear'];
        $imdb = $_POST['imdb'];
        $rating = $_POST['rating'];
        $category = $_POST['category'];
        $description = $_POST['description'];
        $poster = $_FILES["movieposter"]['name'];

        if (file_exists("upload/" . $_FILES["movieposter"]["name"])){
            $store =  $_FILES["movieposter"]["name"];
            $_SESSION['status'] = "<div class='alert alert-danger' role='alert'>Image already exists '.$store.'</div>";
            header('Location: movies.php');
        } else {
            $query = ("INSERT INTO movies (mname,myear,imdb,ratings,category,description,poster) VALUES ('$moviename', '$year', '$imdb', '$rating', '$category', '$description', '$poster')");
            $query_run = mysqli_query($con, $query);
            
            if ($query_run) {
                move_uploaded_file($_FILES["movieposter"]["tmp_name"], "upload/".$_FILES["movieposter"]["name"]);
                // echo "Saved";
                $_SESSION['success'] = "<div class='alert alert-primary' role='alert'>Movie Added</div>";
                header('Location: movies.php');
            } else {
                $_SESSION['status'] = "<div class='alert alert-danger' role='alert'>Movie Not Added</div>";
                header('Location: movies.php');
            }         
        }
    }

    if (isset($_POST['deleteBtn'])) {
        $id = $_POST['delete_id'];
        $delete_poster = $_POST['delete_poster'];

        $query = "DELETE FROM movies WHERE mid = '$id'";
        $query_run = mysqli_query($con, $query);

        if ($query_run) {
            unlink("upload/".$delete_poster);
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

        $poster_query = "SELECT * FROM movies WHERE mid = '$edit_id'";
        $poster_query_run = mysqli_query($con, $poster_query);

        foreach($poster_query_run as $poster_row) {
            if ($edit_poster == NULL) {
                // update with existing images
                $image_data = $poster_row['poster'];
            } else {
                // update with new image
                if ($poster_path = "upload/".$poster_row['poster']) {
                    unlink($poster_path);
                    $image_data = $edit_poster;
                }             
            }
        }

        $query = "UPDATE movies SET mname = '$edit_moviename', myear = '$edit_year', imdb = '$edit_imdb', ratings = '$edit_rating', category = '$edit_category', description = '$edit_description', poster = '$image_data' WHERE mid = '$edit_id' ";
        $query_run = mysqli_query($con, $query);

        if ($query_run) {
            if ($edit_poster == NULL) {
                // update with existing images
                $_SESSION['success'] = "<div class='alert alert-primary' role='alert'>Movie updated</div>";
                header('Location: movies.php');          
            } else {
                // update with new image
                move_uploaded_file($_FILES["movieposter"]["tmp_name"], "upload/".$_FILES["movieposter"]["name"]);
                $_SESSION['success'] = "<div class='alert alert-primary' role='alert'>Movie updated with a new image</div>";
                header('Location: movies.php');          
            }
        } else {
            $_SESSION['status'] = "<div class='alert alert-danger' role='alert'>Movie not updated</div>";
            header('Location: movies.php');
        }
    }
  ?>