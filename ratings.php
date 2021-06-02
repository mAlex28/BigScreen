<?php
include('dbconfig.php');

if (isset($_POST['save'])) {
    $userid = $_POST['userid'];
    $movieid = $_POST['movieid'];
    $ratedIndex = $_POST['ratedIndex'];
    $ratedIndex++;

    $query = "SELECT * FROM ratings WHERE user = '$userid'";
    $query_run = mysqli_query($con, $query);

    if (mysqli_num_rows($query_run) > 0) {
        $queryupdate = "UPDATE ratings SET rating = '$ratedIndex' WHERE user = '$userid'";
        $queryupdate_run = mysqli_query($con, $queryupdate);
    } else {
        $queryinsert = "INSERT INTO ratings (user, movie, rating) VALUES ('$userid', '$movieid', '$ratedIndex')";
        $queryinsert_run = mysqli_query($con, $queryinsert);
    }

    exit(json_encode(array('id' => $userid)));
}


?>