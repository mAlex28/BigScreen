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

        <form action="moviecode.php" method="POST" enctype="multipart/form-data">
            <div class="modal-body">

                <div class="form-group">
                    <label>Name</label>
                    <input type="text" name="moviename" class="form-control" placeholder="Enter Movie Name" required>
                </div>

                <div class="form-group">
                    <label>Year</label>
                    <input type="text" name="movieyear" class="form-control" placeholder="Enter Year" required>
                </div>

                <div class="form-group">
                    <label>IMDB</label>
                    <input type="text" name="imdb" class="form-control" placeholder="Enter IMDB" required>
                </div>

                <div class="form-group">
                    <label>Ratings</label>
                    <input type="text" name="rating" class="form-control" placeholder="Enter Ratings">
                </div>

                <div class="form-group">
                    <label>Category</label>
                    <input type="text" name="category" class="form-control" placeholder="Enter Category/Genre" required>
                </div>
                
                <div class="form-group">
                    <label>Description</label>
                    <textarea type="text" name="moviedescription" class="form-control" placeholder="Enter Descripton"></textarea>
                </div>

                <div class="form-group">
                    <label>Upload Poster</label>
                    <input type="file" name="movieposter" id="movieposter" class="form-control" required>
                </div>
            </div>

            <div class="modal-footer">
                <button type="submit" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="submit" name="addMovieBtn" class="btn btn-primary">Save</button>
            </div>
        </form>
    </div>
  </div>
</div>

<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800">Movies</h1>
    <p class="mb-4"></p>
    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Movies 
            <button type="submit" class="btn btn-primary" data-toggle="modal" data-target="#addadminprofile">
                Add Movie
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
              
              $query = "SELECT * FROM movies";
              $query_run = mysqli_query($con, $query);
          ?>
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Name</th>
                            <th>Year</th>
                            <th>IMDB</th>
                            <th>Ratings</th>
                            <th>Category</th>
                            <th>Description</th>
                            <th>Poster</th>
                            <th>Edit</th>
                            <th>Delete</th>
                        </tr>
                    </thead>
                    <tfoot>
                        <tr>
                            <th>ID</th>
                            <th>Name</th>
                            <th>Year</th>
                            <th>IMDB</th>
                            <th>Ratings</th>
                            <th>Category</th>
                            <th>Description</th>
                            <th>Poster</th>
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
                            <td><?php  echo $row['mid'];  ?></td>
                            <td><?php  echo $row['mname'];  ?></td>
                            <td><?php  echo $row['myear'];  ?></td>
                            <td><?php  echo $row['imdb'];  ?></td>
                            <td><?php  echo $row['ratings'];  ?></td>
                            <td><?php  echo $row['category'];  ?></td>
                            <td><?php  echo $row['description'];  ?></td>
                            <td><?php  echo '<img src="upload/'.$row['poster'].'"width="100px" height="100px" alt="image">'?></td>
                            <td>
                                <form action="editMovie.php" method="POST"> 
                                    <input type="hidden" name="edit_id" value="<?php  echo $row['mid'];  ?>">
                                    <button type="submit" name="editBtn" class="btn btn-success">Edit</button>
                                </form>
                            </td>
                            <td>
                                <form action="moviecode.php" method="POST">
                                <input type="hidden" name="delete_id" value="<?php  echo $row['mid'];  ?>">
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
include('includes/footer.php')
?>