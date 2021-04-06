<?php
    require_once('config.php');
?>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Reset password</title>

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css" integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="css/forgotpassword.css">
    <script src="https://kit.fontawesome.com/338bf2ef1a.js" crossorigin="anonymous"></script>
</head>
<body data-spy="scroll" data-target="#navbarResponsive">
<div>
    <?php
   
    ?> 
    </div>

    <!-- Login -->
    <div class="forgotpassword">
        <form action="forgot_password.php" method="POST" class="box">
            <h1>Reset Password</h1>
            <input type="email" id="email" placeholder="Enter your email address" name="email" required>
            <input type="submit" id="recover"  value="Send Mail" name="recover">
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
            $('#recover').click(function(e) {
                
                var valid = this.form.checkValidity();
                if (valid) {
                    var email = $('#email').val();
             
                    e.preventDefault();

                    $.ajax({
                        type: 'POST',
                        url: 'reset_pass_process.php',
                        data: {email: email},
                        success: function(data) {
                            swal({
                                // title: "Mail Sent",
                                text: data,
                                icon: "success",
                            });
                        },
                        error: function(data) {
                            swal({
                                title: "An error occurred",
                                text: "Please check all the details",
                                icon: "error",
                            });
                        }
                    });
                } else {
                    
                }
            });
        });
    </script>
</body>
</html>