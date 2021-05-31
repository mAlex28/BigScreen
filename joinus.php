<?php
include('dbconfig.php');
?>

<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="UTF-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1.0,maximum-scale=1">
		
		<title>Movie Review | Join Us</title>

		<!-- Loading third party fonts -->
		<link href="http://fonts.googleapis.com/css?family=Roboto:300,400,700|" rel="stylesheet" type="text/css">
		<link href="fonts/font-awesome.min.css" rel="stylesheet" type="text/css">

		<!-- Loading main css file -->
		<link rel="stylesheet" href="style.css">
		
		<!--[if lt IE 9]>
		<script src="js/ie-support/html5.js"></script>
		<script src="js/ie-support/respond.js"></script>
		<![endif]-->

	</head>


	<body>
		

		<div id="site-content">
		<header class="site-header">
			<div class="container">
				<a href="index.php" id="branding">
					<img src="images/logo.png" alt="" class="logo">
					<div class="logo-copy">
						<h1 class="site-title">Big Screen</h1>
						<small class="site-description">Review your favourite movies</small>
					</div>
				</a> <!-- #branding -->

				<div class="main-navigation">
					<button type="button" class="menu-toggle"><i class="fa fa-bars"></i></button>
					<ul class="menu">
						<li class="menu-item"><a href="index.php">Home</a></li>
						<li class="menu-item"><a href="about.php">About</a></li>
						<li class="menu-item"><a href="review.php">Movie reviews</a></li>
						<li class="menu-item"><a href="news.php">News</a></li>
						<li class="menu-item current-menu-item"><a href="joinus.php">Join us</a></li>
						<li class="menu-item"><a href="contact.php">Contact</a></li>
					</ul> <!-- .menu -->

					<form action="#" class="search-form">
						<input type="text" placeholder="Search...">
						<button><i class="fa fa-search"></i></button>
					</form>
				</div> <!-- .main-navigation -->

				<div class="mobile-navigation"></div>
			</div>
		</header>
			<main class="main-content">
				<div class="container">
					<div class="page">
						<div class="breadcrumbs">
							<a href="index.php">Home</a>
							<span>Join Us</span>
						</div>

						<div class="content" style="height: 800px;">
							<div class="row">
								<div class="col-md-4">
								
								</div>
								<div class="col-md-4">
									<div class="feature">
										<h3 class="feature-title">Log In</h3>
										<small class="feature-subtitle">Login to your account</small>

										
											<input name="email" type="text" class="email" placeholder="Enter your email" required>
											<input name="password" type="text" class="pass" placeholder="Enter your password" required>
											<a href="review.php" class="button">Log In</a>
						
										<a href="register.php" class="link">Don't Have an account?Register</a>
										<a href="resetpass.php" class="link">Reset Password</a>
									</div>
								</div>
								<div class="col-md-4">
							
								</div>
							</div>
						</div>
					</div>
				</div> <!-- .container -->
			</main>
			<footer class="site-footer">
				<div class="container">
					<div class="row">
						<div class="col-md-2">
							<div class="widget">
								<h3 class="widget-title">About Us</h3>
								<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Quia tempore vitae mollitia nesciunt saepe cupiditate</p>
							</div>
						</div>
						<div class="col-md-2">
							<div class="widget">
								<h3 class="widget-title">Recent Review</h3>
								<ul class="no-bullet">
									<li>Lorem ipsum dolor</li>
									<li>Sit amet consecture</li>
									<li>Dolorem respequem</li>
									<li>Invenore veritae</li>
								</ul>
							</div>
						</div>
						<div class="col-md-2">
							<div class="widget">
								<h3 class="widget-title">Help Center</h3>
								<ul class="no-bullet">
									<li>Lorem ipsum dolor</li>
									<li>Sit amet consecture</li>
									<li>Dolorem respequem</li>
									<li>Invenore veritae</li>
								</ul>
							</div>
						</div>
						<div class="col-md-2">
							<div class="widget">
								<h3 class="widget-title">Join Us</h3>
								<ul class="no-bullet">
									<li>Lorem ipsum dolor</li>
									<li>Sit amet consecture</li>
									<li>Dolorem respequem</li>
									<li>Invenore veritae</li>
								</ul>
							</div>
						</div>
						<div class="col-md-2">
							<div class="widget">
								<h3 class="widget-title">Social Media</h3>
								<ul class="no-bullet">
									<li>Facebook</li>
									<li>Twitter</li>
									<li>Google+</li>
									<li>Pinterest</li>
								</ul>
							</div>
						</div>
						<div class="col-md-2">
							<div class="widget">
								<h3 class="widget-title">Newsletter</h3>
								<form action="#" class="subscribe-form">
									<input type="text" placeholder="Email Address">
								</form>
							</div>
						</div>
					</div> <!-- .row -->

					<div class="colophon">Copyright 2014 Company name, Designed by Themezy. All rights reserved</div>
				</div> <!-- .container -->

			</footer>
		</div>
		<!-- Default snippet for navigation -->
		


		<script src="js/jquery-1.11.1.min.js"></script>
		<script src="js/plugins.js"></script>
		<script src="js/app.js"></script>
		
	</body>

</html>