<?php
    session_start();
    if (!isset($_SESSION['userlogin'])) {
        header("Location: login.php");
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home</title>

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css" integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="css/user_account.css">
    <script src="https://kit.fontawesome.com/338bf2ef1a.js" crossorigin="anonymous"></script>
</head>
</head>
<body data-spy="scroll" data-target="#navbarResponsive">
    <!-- Navigation bar -->
    <div class="container-fluid p-0">
        <nav class="navbar navbar-expand-md navbar-dark bg-light fixed-top">
            <a class="navbar-brand" href="#">
                <i class="fas fa-film fa-1.5x"></i>
                        BigScreen
            </a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav ml-auto">  
                    <form class="form-inline my-2 my-lg-0 pr-2">
                    <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
                    <button class="btn btn-secondary btn-md" type="submit" id="searchBtn"><i class="fas fa-search fa-1.5x"></i></button>
                    </form>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <?php
                            if (isset($_SESSION['userlogin'])) {
                                echo $_SESSION['usersname'];
                            }
                        ?>
                        </a>
                        <div class="dropdown-menu dropdown-menu-right" id="dropMenu" role="group" aria-labelledby="navbarDropdown">
                            <a class="dropdown-item" href="user_news.php">News</a>
                            <a class="dropdown-item" href="user_activity.php">Reviews and comments</a>
                            <a class="dropdown-item" href="user_account.php">Profile</a>
                            <div class="dropdown-divider"></div>
                            <a class="dropdown-item" href="contact.php">Contact</a>
                        </div>
                    </li>
                </ul>
            </div>
        </nav>
    </div>

    <!-- User profile -->
    <div class="update">
        <form action="user_account.php" method="POST" class="box">
            <h1>User Profile</h1>
            <table>
            <tr>
                <td>
                    <label for="firstname">First Name</label>
                </td>  
                <td>   
                    <input type="text" id="firstname" placeholder="First Name" name="firstname" required>
                </td>            
            </tr>
            <tr>
                <td>
                    <label for="lastname">Last Name</label>
                </td>  
                <td>   
                    <input type="text" id="lastname" placeholder="Last Name" name="lastname" required>
                </td>            
            </tr>
            <tr>
                <td>
                    <label for="email">Email</label>   
                </td>  
                <td>   
                    <input type="email" id="email" placeholder="Email" name="email" required>
                </td>            
            </tr>
            <tr>
                <td>
                    <label for="username">Username</label>
                </td>  
                <td>   
                    <input type="text" id="username" placeholder="Username" name="username" required>
                </td>            
            </tr>
            </table>
            <a href="forgot_password.php">Reset Password</a>
            <input class="btn" type="submit" value="Update profile" name="update" id="update">
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