<?php
    session_start();
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
          $con = mysqli_connect("localhost", "root", "", "Big_Screen");
            if (isset($_POST['editBtn'])) {
                $id = $_POST['edit_id'];
                
                $query = "SELECT * FROM admin where id = '$id' ";
                $query_run = mysqli_query($con, $query);

                foreach($query_run as $row) {
                    ?>

        <form action="code.php" method="post">
            <input type="hidden" name="edit_id" value="<?php  echo $row['id'];  ?>">
            <div class="form-group">
                <label>Username</label>
                <input type="text" name="edit_username" value="<?php  echo $row['username'];  ?>" class="form-control" placeholder="Enter Username">
            </div>

            <div class="form-group">
                <label>Email</label>
                <input type="email" name="edit_email" value="<?php  echo $row['email'];  ?>" class="form-control" placeholder="Enter Email">
            </div>

            <div class="form-group">
                <label>Password</label>
                <input type="password" name="edit_password" value="<?php  echo $row['password'];  ?>" class="form-control" placeholder="Enter Password">
            </div>
            
            <a href="register.php" class="btn btn-secondary">Cancel</a>
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