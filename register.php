<?php
    require_once('config.php')
?>

<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css" integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="css/register.css">
    <script src="https://kit.fontawesome.com/338bf2ef1a.js" crossorigin="anonymous"></script>
</head>
<body data-spy="scroll" data-target="#navbarResponsive">
    <div>
        <?php
            if (isset($_POST['register'])) {
                $firstname = $_POST['fname'];
                $lastname = $_POST['lname'];
                $email = $_POST['email'];
                $username = $_POST['username'];
                $password = $_POST['password'];

                $sql = "INSERT INTO User (fname, lname, email, username, password) values (?,?,?,?,?)";
                $statemtentinsert = $db->prepare($sql);
                $result = $statemtentinsert->execute([$firstname, $lastname, $email, $username, $password]);
                if ($result) {
                    echo 'successfully registered';
                } else {
                    echo 'an error occurred';
                }
            }
        ?>
    </div>

    <div class="container-fluid p-0">
        <!-- Navigation bar -->
        <nav class="navbar navbar-expand-md navbar-dark bg-dark fixed-top">
            <a class="navbar-brand" href="index.html">
                <i class="fas fa-film fa-1.5x"></i>
                BigScreen
            </a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarResponsive">
                <ul class="navbar-nav ml-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="index.html">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="browse.php">Browse</a>
                    </li>  
                    <li class="nav-item">
                        <a class="nav-link" href="news.php">News</a>
                    </li>
                    <li class="nav-item active">
                        <a class="nav-link" href="login.php">Sign In</a>
                    </li> 
                    <li class="nav-item">
                        <a class="nav-link" href="contact.php">Contact</a>
                    </li>    
                </ul>
            </div>  
        </nav>   
    </div>

    <!-- Register -->
    <div class="register">
        <form action="register.php" method="POST" class="box">
            <h1>Register</h1>
            <input type="text" id="firstname" placeholder="First Name" name="fname" required>
            <input type="text" id="lastname" placeholder="Last Name" name="lname" required>
            <input type="email" id="email" placeholder="Email" name="email" required>
            <input type="text" id="username" placeholder="Username" name="username" required>
            <input type="password" id="password" placeholder="Password" name="password" required>
            <input type="password" id="confpass" placeholder="Confirm password" name="confpass" required>
            <input class="btn" type="submit" value="Register" name="register" id="register">
            Have an account? <a href="login.php">Sign In</a> <br>
        </form>
    </div>

    <!-- Script files -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.min.js" integrity="sha384-+YQ4JLhjyBLPDQt//I+STsc9iw4uQqACwlvpslubQzn4u2UU2UFM80nGisd026JF" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@8"></script>
    <script type="text/javascript"> 
        $(function() { 
            $('#register').on('click', function(e) {

                var valid = this.form.checkValidity();

                if (valid) {
                    var firstname = $('#firstname').val();
                    var lastname = $('#lastname').val();
                    var email = $('#email').val();
                    var username = $('#username').val();
                    var password = $('#password').val();

                    $.ajax ({
                        type: 'POST',
                        url: 'process.php',
                        data: {firstname: firstname,lastname: lastname,email: email,username: username,password: password},
                        dataType: "json",
                        async: false,
                        success: function(data) {
                            Swal.fire({
                            icon: 'success',
                            title: 'User Registered',
                            text: 'login to continue'
                            })
                            console.log('success');
                        },
                        error: function(data) {
                            Swal.fire({
                                icon: 'error',
                                title: 'Oops...',
                                text: 'Something went wrong!'
                            })
                            console.log('error');
                        } 
                    });
                    // e.preventDefalult();
                } else {
                  
                }
            });
            
         });
    </script>
</body>
</html>