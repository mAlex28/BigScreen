<?php
include('security.php');
include('includes/header.php');
include('includes/navbar.php');
?>

<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800">Contacts</h1>
    <p class="mb-4"></p>
    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Recent contact messages</h6>
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
              
              $query = "SELECT * FROM contacts";
              $query_run = mysqli_query($con, $query);
          ?>
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Subject</th>
                            <th>Message</th>
                        </tr>
                    </thead>
                    <tfoot>
                        <tr>
                            <th>ID</th>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Subject</th>
                            <th>Message</th>
                        </tr>
                    </tfoot>
                    <tbody>
                    <?php
                        if(mysqli_num_rows($query_run) > 0) {
                            while($row = mysqli_fetch_assoc($query_run)) {
                                ?>
                        <tr>
                            <td><?php  echo $row['c_id'];  ?></td>
                            <td><?php  echo $row['c_name'];  ?></td>
                            <td><?php  echo $row['c_email'];  ?></td>
                            <td><?php  echo $row['subject'];  ?></td>
                            <td><?php  echo $row['message'];  ?></td>
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
include('includes/footer.php')
?>