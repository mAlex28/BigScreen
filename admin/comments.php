<?php
include('security.php');
include('includes/header.php');
include('includes/navbar.php');
?>

<!-- Modal -->
<div class="modal fade" id="addcomment" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Add comment</h5>
                <button type="submit" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>

            <form action="cmntcode.php" method="POST">
                <div class="modal-body">

                <?php
                    $user = "SELECT * FROM users";      
                    $user_run = mysqli_query($con, $user);
                 
                    if (mysqli_num_rows($user_run)) {

                    ?>
                        <div class="form-group">
                            <label>Username</label>
                            <select name="username" id="" class="form-control" required>
                                <option value="">Choose the user</option>
                                <?php
                                foreach ($user_run as $row) {
                                ?>
                                    <option value="<?php echo $row['id']; ?>"><?php echo $row['username']; ?></option>
                                <?php }  ?>
                            </select>
                        </div>
                    <?php
                    } else {
                        echo "No data available";
                    }
                    ?>
                    

                    <?php
                        $movie = "SELECT * FROM movies";
                        $movie_run = mysqli_query($con, $movie);

                        if (mysqli_num_rows($movie_run)) {

                    ?>
                        <div class="form-group">
                            <label>Movie</label>
                            <select name="movie" id="" class="form-control" required>
                                <option value="">Choose the movie</option>
                                <?php
                                foreach ($movie_run as $row) {
                                ?>
                                    <option value="<?php echo $row['mid']; ?>"><?php echo $row['mname']; ?></option>
                                <?php }  ?>
                            </select>
                        </div>
                    <?php
                    } else {
                        echo "No data available";
                    }
                    ?>



                    <div class="form-group">
                        <label>Date</label>
                        <input type="date" name="date" class="form-control">
                    </div>

                    <div class="form-group">
                        <label>Comment</label>
                        <input type="text" name="comment" class="form-control" placeholder="Comment here" required>
                    </div>
                </div>

                <div class="modal-footer">
                    <button type="submit" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" name="addCmntBtn" class="btn btn-primary">Save</button>
                </div>
            </form>
        </div>
    </div>
</div>

<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800">Comments</h1>
    <p class="mb-4"></p>
    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <button type="submit" class="btn btn-primary" data-toggle="modal" data-target="#addcomment">
                Add Comment
            </button>
            <form action="cmntcode.php" method="post">
                <button type="submit" class="btn btn-danger" name="deleteMultipleData">
                    Delete Multiple Comments
                </button>
            </form>
        </div>

        <div class="card-body">
            <?php
            if (isset($_SESSION['success']) && $_SESSION['success'] != '') {
                echo '<h2>' . $_SESSION['success'] . ' </h2>';
                unset($_SESSION['success']);
            }

            if (isset($_SESSION['status']) && $_SESSION['status'] != '') {
                echo '<h2>' . $_SESSION['status'] . ' </h2>';
                unset($_SESSION['status']);
            }
            ?>
            <div class="table-responsive">

                <?php

                $query = "SELECT * FROM comments";
                $query_run = mysqli_query($con, $query);

                ?>
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>Check</th>
                            <th>ID</th>
                            <th>Date</th>
                            <th>User Name</th>
                            <th>Movie Name</th>
                            <th>Comment</th>
                            <th>Delete</th>
                        </tr>
                    </thead>
                    <tfoot>
                        <tr>
                            <th>Check</th>
                            <th>ID</th>
                            <th>Date</th>
                            <th>User Name</th>
                            <th>Movie Name</th>
                            <th>Comment</th>
                            <th>Delete</th>
                        </tr>
                    </tfoot>
                    <tbody>
                        <?php
                        if (mysqli_num_rows($query_run) > 0) {
                            while ($row = mysqli_fetch_assoc($query_run)) {
                                
                                $movie_id = $row['movieId'];
                                $movie_name = "SELECT * FROM movies WHERE mid = '$movie_id'";
                                $movie_name_run = mysqli_query($con, $movie_name);

                                $user_id = $row['userId'];
                                $user_name = "SELECT * FROM users WHERE id = '$user_id'";
                                $user_name_run = mysqli_query($con, $user_name);
                        ?>
                                <tr>
                                    <td>

                                        <input type="checkbox" onclick="toggleCheckbox(this)" value="<?php echo $row['id'];  ?>" <?php echo $row['visible'] == 1 ? "checked" : "" ?>>
                                    </td>
                                    <td><?php echo $row['id'];  ?></td>
                                    <td><?php echo $row['date'];  ?></td>
                                    <td>
                                        <?php 
                                            foreach ($user_name_run as $user_row) { 
                                                echo $user_row['username'];
                                            }
                                        ?>
                                    </td>
                                    <td>
                                        <?php 
                                            foreach ($movie_name_run as $movie_row) { 
                                                echo $movie_row['mname'];
                                            }
                                        ?>
                                    </td>
                                    <td><?php echo $row['comment'];  ?></td>
                                    <td>
                                        <form action="cmntcode.php" method="POST">
                                            <input type="hidden" name="delete_id" value="<?php echo $row['id'];  ?>">
                                            <button type="submit" name="deleteBtn" class="btn btn-danger">Delete</button>
                                        </form>
                                    </td>
                                </tr>
                        <?php
                            }
                        } else {
                            echo "No record found";
                        }
                        ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

</div>
<!-- /.container-fluid -->


<?php
include('includes/script.php');
?>

<script>
    function toggleCheckbox(ckBox) {
        var id = $(ckBox).attr("value");

        if ($(ckBox).prop("checked") == true) {
            var visible = 1;
        } else {
            var visible = 0;
        }

        var data = {
            "search_data": 1,
            "mid": id,
            "visible": visible
        };

        $.ajax({
            type: "post",
            url: "moviecode.php",
            data: data,
            success: function(response) {
                // alert("Data Checked/Unchecked")
            }
        });
    }
</script>

<?
include('includes/footer.php');
?>