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
        <h5 class="modal-title" id="exampleModalLabel">Add News</h5>
        <button type="submit" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>

        <form action="newscode.php" method="POST">
            <div class="modal-body">

                <div class="form-group">
                    <label>Title</label>
                    <input type="text" name="title" class="form-control" placeholder="Enter News Title">
                </div>

                <div class="form-group">
                    <label>Description</label>
                    <textarea type="text" name="description" class="form-control" placeholder="Enter News Description"></textarea>
                </div>

                <div class="form-group">
                    <label>Links</label>
                    <input type="text" name="links" class="form-control" placeholder="Enter Links">
                </div>
            </div>

            <div class="modal-footer">
                <button type="submit" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="submit" name="addNewsBtn" class="btn btn-primary">Save</button>
            </div>
        </form>
    </div>
  </div>
</div>

<div class="container-fluid">
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">News
            <button type="submit" class="btn btn-primary" data-toggle="modal" data-target="#addadminprofile">
                Add News
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
               
                $query = "SELECT * FROM news";
                $query_run = mysqli_query($con, $query);
            ?>
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Title</th>
                            <th>Description</th>
                            <th>Links</th>
                            <th>Edit</th>
                            <th>Delete</th>
                        </tr>
                    </thead>
                    <tfoot>
                    <tr>
                            <th>ID</th>
                            <th>Title</th>
                            <th>Description</th>
                            <th>Links</th>
                            <th>Edit</th>
                            <th>Delete</th>
                        </tr>
                    </tfoot>
                    <tbody>
                    <?php
                        if(mysqli_num_rows($query_run) > 0) {
                            while($row = mysqli_fetch_assoc($query_run)) {
                                ?>
                        <tr>
                            <td><?php  echo $row['id'];  ?></td>
                            <td><?php  echo $row['title'];  ?></td>
                            <td><?php  echo $row['description'];  ?></td>
                            <td><?php  echo $row['links']; ?></td>
                            <td>
                                <form action="editnews.php" method="POST"> 
                                    <input type="hidden" name="edit_id" value="<?php  echo $row['id'];  ?>">
                                    <button type="submit" name="editBtn" class="btn btn-success">Edit</button>
                                </form>
                            </td>
                            <td>
                                <form action="newscode.php" method="POST">
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