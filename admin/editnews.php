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
                
                $query = "SELECT * FROM news where id = '$id' ";
                $query_run = mysqli_query($con, $query);

                foreach($query_run as $row) {
                    ?>

        <form action="newscode.php" method="post">
            <input type="hidden" name="edit_id" value="<?php  echo $row['id'];  ?>">
            <div class="form-group">
                <label>Title</label>
                <input type="text" name="edit_title" value="<?php  echo $row['title'];  ?>" class="form-control" placeholder="Enter Username">
            </div>

            <div class="form-group">
                <label>Description</label>
                <textarea type="text" name="edit_description" class="form-control" placeholder="Enter Description"><?php  echo $row['description'];  ?></textarea>
            </div>

            <div class="form-group">
                <label>Links</label>
                <input type="tex" name="edit_links" value="<?php  echo $row['links'];  ?>" class="form-control" placeholder="Enter Password">
            </div>
            
            <a href="news.php" class="btn btn-secondary">Cancel</a>
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