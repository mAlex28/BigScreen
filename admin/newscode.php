<?php

include('security.php');
$con = mysqli_connect("localhost", "root", "", "Big_Screen");

if (isset($_POST['addNewsBtn'])) {
    $title = $_POST['title'];
    $description = $_POST['description'];
    $links = $_POST['links'];
  
    $query = "INSERT INTO news (title, description, links) VALUES ('$title', '$description', '$links')";
    $query_run = mysqli_query($con, $query);

    if ($query_run) {
        // echo "Saved";
        $_SESSION['success'] = "<div class='alert alert-primary' role='alert'>News Added</div>";
        header('Location: news.php');
    } else {
        // echo "Not saved"
        $_SESSION['status'] = "<div class='alert alert-danger' role='alert'>News Not Added</div>";
        header('Location: news.php');
    }


   }

   if (isset($_POST['updateBtn'])) {
    $id = $_POST['edit_id'];
    $title = $_POST['edit_title'];
    $description = $_POST['edit_description'];
    $links = $_POST['edit_links'];

    $query = "UPDATE news SET title = '$title', description = '$description', links = '$links' WHERE id = '$id' ";
    $query_run = mysqli_query($con, $query);

    if ($query_run) {
        $_SESSION['success'] = "<div class='alert alert-primary' role='alert'>News updated</div>";
        header('Location: news.php');
    } else {
        $_SESSION['status'] = "<div class='alert alert-danger' role='alert'>Unable to update news</div>";
        header('Location: news.php');
    }
}

if (isset($_POST['deleteBtn'])) {
$id = $_POST['delete_id'];

$query = "DELETE FROM news WHERE id = '$id'";
$query_run = mysqli_query($con, $query);

if ($query_run) {
    $_SESSION['success'] = "<div class='alert alert-primary' role='alert'>News deleted</div>";
    header('Location: news.php');
} else {
    $_SESSION['status'] = "<div class='alert alert-danger' role='alert'>Unable to news data</div>";
    header('Location: news.php');
}

}
