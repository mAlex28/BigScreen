<?php
    include('security.php');
    include('includes/header.php');
    include('includes/navbar.php');
?>

<!-- Modal -->
<div class="modal fade" id="addadminprofile" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Add admin data</h5>
        <button type="submit" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>

        <form action="code.php" method="POST">
            <div class="modal-body">

                <div class="form-group">
                    <label>Username</label>
                    <input type="text" name="username" class="form-control" placeholder="Enter Username">
                </div>

                <div class="form-group">
                    <label>Email</label>
                    <input type="email" name="email" class="form-control" placeholder="Enter Email">
                </div>

                <div class="form-group">
                    <label>Password</label>
                    <input type="password" name="password" class="form-control" placeholder="Enter Password">
                </div>

                <div class="form-group">
                    <label>Confirm Password</label>
                    <input type="password" name="confirmpassword" class="form-control" placeholder="Confirm Password">
                </div>
            </div>

            <input type="hidden" name="userRole" value="1">

            <div class="modal-footer">
                <button type="submit" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="submit" name="registerBtn" class="btn btn-primary">Save</button>
            </div>
        </form>
    </div>
  </div>
</div>

<div class="container-fluid">
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Admin Profile
            <button type="submit" class="btn btn-primary" data-toggle="modal" data-target="#addadminprofile">
                Add Admin Profile
            </button>
            </h6>
        </div>

        <div class="card-body">

        <?php
            if(isset($_SESSION['success']) && $_SESSION['success'] != '') {
                echo '<h2>'.$_SESSION['success'].' </h2>' ;
                unset($_SESSION['success']);
            }

            if(isset($_SESSION['status']) && $_SESSION['status'] != '') {
                echo '<h2>'.$_SESSION['status'].' </h2>' ;
                unset($_SESSION['status']);
            }
        ?>    

            <div class="table-responsive">

            <?php

                $query = "SELECT * FROM users WHERE UserRole = 1";
                $query_run = mysqli_query($con, $query);
            ?>

                <table class="table table-borded" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Username</th>
                            <th>Email</th>
                            <th>Type</th>
                            <th>Edit</th>
                            <th>Delete</th>

                        </tr>
                    </thead>
                    <tbody>

                    <?php
                        if(mysqli_num_rows($query_run) > 0) {
                            while($row = mysqli_fetch_assoc($query_run)) {
                                ?>

                        <tr>
                            <td><?php  echo $row['id'];  ?></td>
                            <td><?php  echo $row['username'];  ?></td>
                            <td><?php  echo $row['email'];  ?></td>
                            <td><?php  
                                $role = $row['userRole'];
                              
                                if ($role == 1) {
                                    echo 'Admin';  

                                } else {
                                    echo 'User';
                                }


                            ?></td>
                            <td>
                                <form action="editAdmin.php" method="POST"> 
                                    <input type="hidden" name="edit_id" value="<?php  echo $row['id'];  ?>">
                                    <button type="submit" name="editBtn" class="btn btn-success">Edit</button>
                                </form>
                            </td>
                            <td>
                                <form action="code.php" method="POST">
                                <input type="hidden" name="delete_id" value="<?php  echo $row['id'];  ?>">
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

<?php
    include('includes/script.php');
    include('includes/footer.php');
?>