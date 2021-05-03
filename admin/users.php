<?php
    include('security.php');
    include('includes/header.php');
    include('includes/navbar.php');
?>

<div class="container-fluid">
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Users
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
                $con = mysqli_connect("localhost", "root", "", "Big_Screen");
                $query = "SELECT * FROM users";
                $query_run = mysqli_query($con, $query);
            ?>

                <table class="table table-borded" id="dataTable" width="100%" cellspacing="0" >
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Username</th>
                            <th>Email</th>
                            <th>Type</th>
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
                                <form action="code.php" method="POST">
                                <input type="hidden" name="delete_id" value="<?php  echo $row['id'];  ?>">
                                <button type="submit" name="deleteBtnU" class="btn btn-danger">Delete</button>
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