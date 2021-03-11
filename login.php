<?php

?>

<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sign In</title>

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css" integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="css/login.css">
    <script src="https://kit.fontawesome.com/338bf2ef1a.js" crossorigin="anonymous"></script>
</head>
<body data-spy="scroll" data-target="#navbarResponsive">
    <div class="container-fluid p-0">
        <!-- Navigation bar -->
        <nav class="navbar navbar-expand-md navbar-dark bg-dark fixed-top">
            <a class="navbar-brand" href="#">
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

    <!-- Login -->
    <div class="login">
        <form action="" method="POST" class="box">
            <h1>Sign In</h1>
            <input type="text" placeholder="Username" name="name">
            <input type="password" placeholder="Password" name="password">
            <input class="btn" type="submit" value="Sign in">
            Don't have an account? <a href="register.php">Register</a> <br>
            <a href="forgot_password.php">Forgot Password</a>
        </form>
    </div>
    
        

    <!-- Footer -->
    <footer class="text-white" style="background-color:#141414e0;">
        <div class="container p-4">
            <div class="row">
                <div class="col-lg-7 col-md-12 mb-4 mb-md-0">
                     <!-- About -->
                    <h5 class="text-uppercase">About</h5>
                    <p>
                        Lorem ipsum dolor sit amet consectetur adipisicing elit. Sunt distinctio earum repellat <br> 
                        quaerat voluptatibus placeat nam, <br>
                        commodi optio pariatur est quia magnam eum harum corrupti <br>
                        dicta,  aliquam sequi voluptate quas.
                    </p>
                </div>
                <div class="social col-lg-5 col-md-12 mb-4 mb-md-0">
                    <!-- Social Media -->
                    <h5 class="text-uppercase">Follow Us</h5>
                    <a href="https://www.facebook.com/" class="fab fa-facebook-square fa-2x pr-2 text-decoration-none" target="blank"></a>
                    <a href="https://www.twitter.com/" class="fab fa-twitter fa-2x pr-2 text-decoration-none" target="blank"></a>
                    <a href="https://www.instagram.com/" class="fab fa-instagram fa-2x pr-2 text-decoration-none" target="blank"></a>
                </div>
            </div>
        </div>
        <div class="text-center p-3" style="background-color: rgb(253, 6, 6)">
        © 2020 Copyright:<a class="text-white" href="#">BigScreen.com</a>
        </div>
    </footer>

    <!-- Script files -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.min.js" integrity="sha384-+YQ4JLhjyBLPDQt//I+STsc9iw4uQqACwlvpslubQzn4u2UU2UFM80nGisd026JF" crossorigin="anonymous"></script>
</body>
</html>