<?php
session_start();
include('includes/header.php');
?>

<div class="container">

<!-- Outer Row -->
<div class="row justify-content-center">

    <div class="col-xl-6 col-lg-6 col-md-6">

        <div class="card o-hidden border-0 shadow-lg my-5">
            <div class="card-body p-0">
                <!-- Nested Row within Card Body -->
                <div class="row">
                    <div class="col-lg-12">
                        <div class="p-5">
                            <div class="text-center">
                                <h1 class="h4 text-gray-900 mb-4">Reset Password</h1>

                                <?php
                                    if (isset($_SESSION['status'])) {
                                        echo '<h2>'.$_SESSION['status'].'</h2>';
                                        unset($_SESSION['status']);
                                    }
                                ?>
                            </div>

                            <form class="user" method="POST" action="passResetcode.php">
                                    <input type="hidden" value="<?php if(isset($_GET['token'])) {echo $_GET['token'];} ?>" name="passtoken">

                                <div class="form-group">
                                    <input type="email" name="email" value="<?php if(isset($_GET['email'])) {echo $_GET['email'];} ?>" class="form-control form-control-user" placeholder="Enter Email Address...">
                                </div>
                                <div class="form-group">
                                    <input type="text" name="newpass" class="form-control form-control-user" placeholder="Confirm Passowrd...">
                                </div>
                                <div class="form-group">
                                    <input type="text" name="confpass" class="form-control form-control-user" placeholder="Password">
                                </div>
                                <button type="submit" name="resetConfBtn" class="btn btn-primary btn-user btn-block">Login</button>
                                <hr>
                            </form>
                                <div class="text-center">
                                        <a class="small" href="forgot-password.php">Forgot Password?</a>
                                    </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>

</div>

</div>

<?php
include('includes/script.php');
?>