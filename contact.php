<?php
    require_once('config.php');
?>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contact</title>

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css" integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="css/contact.css">
    <script src="https://kit.fontawesome.com/338bf2ef1a.js" crossorigin="anonymous"></script>
</head>
<body data-spy="scroll" data-target="#navbarResponsive">
<div>
    <?php
   
    ?> 
    </div>
    <!-- Navigation bar -->
    <div class="container-fluid p-0">
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
    
    <!-- Contact us form -->
    <div class="container contact">
        <div class="row">
            <div class="col-md-12">
                <h1 class="display-4 font-weight-bold text-uppercase text-center" id="size">Contact Us</h1>
                <p class="lead text-center">Lorem ipsum dolor, sit amet consectetur adipisicing elit. Quia ad repellendus cupiditate quae, blanditiis modi rem perspiciatis optio officia unde ullam! Corrupti impedit magni magnam tempora error, possimus tenetur vitae.</p>
            </div>
        </div>
        <div class="row">
            <div class="col-md-4">
                <i class="fa fa-map-marker fa-2x text-light" aria-hidden="true"></i>
                <h3>Address</h3>
                <p>166, Washington Street, Califonia, USA </p>
                <i class="fa fa-phone fa-2x text-light"></i>
                <h3>Call Us</h3>
                <p>011-244-5098</p>
                <i class="fa fa-envelope fa-2x text-light"></i>
                <h3>Email</h3>
                <p>bigScreenmovies@gmail.com</p>
            </div>
            <div class="col-md-8">
                <form action="contact.php" method="POST">
                <div class="contactform">
                    <div class="row">
                        <div class="col-md-8">
                            <span id="lblResponse" class="tab-content"></span>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <input type="text" name="tbName" id="tbName" class="form-control my-2" placeholder="Name" required>
                        </div>
                        <br>
                        <div class="col-md-6">
                            <input type="email" name="tbEmail" id="tbEmail" class="form-control my-2" placeholder="Email" required>
                        </div>
                        <br>   
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <input type="text" name="tbSubject" id="tbSubject" class="form-control my-2" placeholder="Subject" required>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <textarea name="tbMessage" id="tbMessage" cols="20" rows="10" class="form-control my-2" placeholder="Message"></textarea>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <input type="submit" name="btnSendMsg" value="Send" id="btnSendMsg" class="btn btn-lg btn-danger btn-outline-light">
                        </div>
                    </div>
                </div>
                </form>
            </div>
        </div>
    </div>

    <!-- Script files -->
    <script src="https:// code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.min.js" integrity="sha384-+YQ4JLhjyBLPDQt//I+STsc9iw4uQqACwlvpslubQzn4u2UU2UFM80nGisd026JF" crossorigin="anonymous"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <script type="text/javascript">
        $(function() {
            $('#btnSendMsg').click(function(e) {
                
                var valid = this.form.checkValidity();
                if (valid) {
                    var tbName = $('#tbName').val();
                    var tbEmail = $('#tbEmail').val();
                    var tbSubject = $('#tbSubject').val();
                    var tbMessage = $('#tbMessage').val();

                    var validateEmail = /^[a-zA-Z0-9.!#$%&'*+/=?^_`{|}~-]+@[a-zA-Z0-9-]+(?:\.[a-zA-Z0-9-]+)*$/;

                    e.preventDefault();

                    if (!tbEmail.match(validateEmail)) {
                        swal({
                            title: "Invalid email",
                            text: "Recheck your email",
                            icon: "error"
                        });
                    } 
                     else {
                        $.ajax({
                            type: 'POST',
                            url: 'contact_process.php',
                            data: {tbName: tbName, tbEmail: tbEmail, tbSubject: tbSubject, tbMessage: tbMessage},
                            success: function(data) {
                                swal({
                                    title: "Sending success",
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