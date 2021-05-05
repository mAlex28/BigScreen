<?php
include('security.php');
    include('includes/header.php');
    include('includes/navbar.php');
?>


<div class="container-fluid">
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Edit Admin Profile</h6>
        </div>

        <div class="card-body">
        <?php
            if (isset($_POST['editBtn'])) {
                $id = $_POST['edit_id'];
                
                $query = "SELECT * FROM movies where mid = '$id' ";
                $query_run = mysqli_query($con, $query);

                foreach($query_run as $row) {
                    ?>

        <form action="moviecode.php" method="post" enctype="multipart/form-data">
            <input type="hidden" name="edit_id" value="<?php  echo $row['mid'];  ?>">
            <div class="form-group">
                    <label>Name</label>
                    <input type="text" name="edit_moviename" class="form-control" value="<?php  echo $row['mname'];  ?>">
                </div>

                <div class="form-group">
                    <label>Year</label>
                    <input type="text" name="edit_movieyear" class="form-control" value="<?php  echo $row['myear'];  ?>">
                </div>

                <div class="form-group">
                    <label>IMDB</label>
                    <input type="text" name="edit_imdb" class="form-control" value="<?php  echo $row['imdb'];  ?>">
                </div>

                <div class="form-group">
                    <label>Ratings</label>
                    <input type="text" name="edit_rating" class="form-control" value="<?php  echo $row['ratings'];  ?>">
                </div>

                <div class="form-group">
                    <label>Category</label>
                    <input type="text" name="edit_category" class="form-control" value="<?php  echo $row['category'];  ?>">
                </div>
                
                <div class="form-group">
                    <label>Description</label>
                    <textarea type="text" name="edit_description" class="form-control"><?php echo $row['description']; ?></textarea>
                </div>

                <div class="form-group">
                    <label>Upload Poster</label>
                    <input type="file" name="movieposter" id="movieposter" class="form-control" value="<?php  echo $row['poster'];  ?>">
                </div>
            
            <a href="movies.php" class="btn btn-secondary">Cancel</a>
            <button type="submit" class="btn btn-primary" name="updateBtn">Update</button>
            </form>
            <?php
                }
            }
        ?>
            
        </div>
    </div>
</div>   

<?php
    include('includes/script.php');
    include('includes/footer.php');
?>