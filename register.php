<?php
    require_once('config.php');
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
            <input type="text" id="firstname" placeholder="First Name" name="firstname" required>
            <input type="text" id="lastname" placeholder="Last Name" name="lastname" required>
            <input type="email" id="email" placeholder="Email" name="email" required>
            <input type="text" id="username" placeholder="Username" name="username" required>
            <input type="password" id="password" placeholder="Password" name="password" required>
            <input type="password" id="confpass" placeholder="Confirm password" name="confpass" required>
            <input class="btn" type="submit" value="Register" name="register" id="register">
            Have an account? <a href="login.php">Log In</a> <br>
        </form>
    </div>

    <!-- Script files -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.min.js" integrity="sha384-+YQ4JLhjyBLPDQt//I+STsc9iw4uQqACwlvpslubQzn4u2UU2UFM80nGisd026JF" crossorigin="anonymous"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <script type="text/javascript">
        $(function() {
            $('#register').click(function(e) {
                
                var valid = this.form.checkValidity();
                if (valid) {
                    var firstname = $('#firstname').val();
                    var lastname = $('#lastname').val();
                    var email = $('#email').val();
                    var username = $('#username').val();
                    var password = $('#password').val();
                    var confpass = $('#confpass').val();

                    var validateEmail = /^[a-zA-Z0-9.!#$%&'*+/=?^_`{|}~-]+@[a-zA-Z0-9-]+(?:\.[a-zA-Z0-9-]+)*$/;
                    var validatePassword = /^(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{6,20}$/;

                    e.preventDefault();

                    if (!email.match(validateEmail)) {
                        swal({
                            title: "Invalid email",
                            text: "Recheck your email",
                            icon: "error",
                        });
                    } else if (!password.match(validatePassword)) {
                        swal({
                            title: "Invalid Password",
                            text: "Password must be between 6 to 20 characters and contain at least one numeric digit, one uppercase and one lowercase letter",
                            icon: "error",
                        });
                    } else if (password != confpass) {
                        swal({
                            title: "Passwords does not match",
                            text: "Recheck your passwords",
                            icon: "error",
                        });
                    } else {
                        $.ajax({
                            type: 'POST',
                            url: 'reg_process.php',
                            data: {firstname: firstname,lastname: lastname,email: email,username: username,password
                                : password},
                            success: function(data) {
                                swal({
                                    title: "mmm...",
                                    text: data,
                                    icon: "success"
                                });
                            
                            },
                            error: function(data) {
                                swal({
                                    title: "An error occurred",
                                    text: "Please check all the details",
                                    icon: "error"
                                });
                            }
                        });
                    
                    }
                } else {
                    
                }
            });
        });
    </script>
</body>
</html>