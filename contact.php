<?php
session_start();
include('admin/database/dbconfig.php');
?>

<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0,maximum-scale=1">

	<title>Movie Review | Contact</title>

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

	
				<?php
				if ($_SESSION['username']) { ?>

					<div class="main-navigation">
						<button type="button" class="menu-toggle"><i class="fa fa-bars"></i></button>
						<ul class="menu">
							<li class="menu-item"><a href="index.php">Home</a></li>
							<li class="menu-item"><a href="about.php">About</a></li>
							<li class="menu-item"><a href="review.php">Movie reviews</a></li>
							<li class="menu-item"><a href="news.php">News</a></li>
							<li class="menu-item"><a href="#"><?php echo $_SESSION['username']; ?></a></li>
							<li class="menu-item current-menu-item"><a href="contact.php">Contact</a></li>
						</ul> <!-- .menu -->
						<form action="#" class="search-form">
							<input type="text" placeholder="Search...">
							<button><i class="fa fa-search"></i></button>
						</form>
					</div> <!-- .main-navigation -->

				<?php } else { ?>
					<div class="main-navigation">
						<button type="button" class="menu-toggle"><i class="fa fa-bars"></i></button>
						<ul class="menu">
							<li class="menu-item current-menu-item"><a href="index.php">Home</a></li>
							<li class="menu-item"><a href="about.php">About</a></li>
							<li class="menu-item"><a href="review.php">Movie reviews</a></li>
							<li class="menu-item"><a href="news.php">News</a></li>
							<li class="menu-item"><a href="joinus.php">Join Us</a></li>
							<li class="menu-item current-menu-item"><a href="contact.php">Contact</a></li>
						</ul> <!-- .menu -->
						<form action="#" class="search-form">
							<input type="text" placeholder="Search...">
							<button><i class="fa fa-search"></i></button>
						</form>
					</div> <!-- .main-navigation -->
				<?php } ?>

				<div class="mobile-navigation"></div>
			</div>
		</header>
		<main class="main-content">
			<div class="container">
				<div class="page">
					<div class="breadcrumbs">
						<a href="index.php">Home</a>
						<span>Contact</span>
					</div>

					<div class="content">
						<div class="row">
							<div class="col-md-4">
								<h2>Contact</h2>
								<ul class="contact-detail">
									<li>
										<img src="images/icon-contact-map.png" alt="#">
										<address><span>Big Screen. INC</span> <br>550 Baker Street, London</address>
									</li>
									<li>
										<img src="images/icon-contact-phone.png" alt="">
										<a href="tel:1590912831">+94 776 912 831</a>
									</li>
									<li>
										<img src="images/icon-contact-message.png" alt="">
										<a href="mailto:contact@companyname.com">moviereviews@bigscreen.com</a>
									</li>
								</ul>
								<div class="contact-form">
									<form action="sendcontact.php" method="POST">
									<input type="text" class="name" name="name" placeholder="name..." required>
									<input type="email" class="email" name="email" placeholder="email..." required>
									<input type="text" class="website" name="subj" placeholder="subject..." required>
									<textarea class="message" name="msg" placeholder="message..." required></textarea>
									<input type="submit" name="subBtn" value="Send Message ">
									</form>
								</div>
							</div>
							<div class="col-md-7 col-md-offset-1">
								<div class="map"></div>
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
							<p>Welcome to the BigScreen.com, the best place for movie criticism, commentary and community.</p>
						</div>
					</div>
					<div class="col-md-2">
						<div class="widget">
							<h3 class="widget-title">Movie Genres</h3>
							<ul class="no-bullet">
								<li><a href="#">Action</a></li>
								<li><a href="#">Comedy</a></li>
								<li><a href="#">Drama</a></li>
								<li><a href="#">Romance</a></li>
							</ul>
						</div>
					</div>
					<div class="col-md-2">
						<div class="widget">
							<h3 class="widget-title">Help Center</h3>
							<ul class="no-bullet">
								<li><a href="#">FAQ</a></li>
								<li><a href="#">Contact</a></li>
								<li><a href="#">Advertise</a></li>
								<li><a href="#">Contributors</a></li>
							</ul>
						</div>
					</div>
					<div class="col-md-2">
						<div class="widget">
							<h3 class="widget-title">Join Us</h3>
							<ul class="no-bullet">
								<li><a href="#">Carriers</a></li>
								<li><a href="#">Developers</a></li>
								<li><a href="#">Reviewers</a></li>
								<!-- <li><a href="#">Invenore veritae</a></li> -->
							</ul>
						</div>
					</div>
					<div class="col-md-2">
						<div class="widget">
							<h3 class="widget-title">Social Media</h3>
							<ul class="no-bullet">
								<li><a target="_blank" href="https://www.facebook.com/">Facebook</a></li>
								<li><a target="_blank" href="https://www.twitter.com/">Twitter</a></li>
								<li><a target="_blank" href="https://www.youtube.com/">Youtube</a></li>
								<li><a target="_blank" href="https://www.instagram.com/">Instagram</a></li>
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

				<div class="colophon">Copyright 2014 Big Screen, Designed by Themezy. All rights reserved</div>
			</div> <!-- .container -->

		</footer>
	</div>
	<!-- Default snippet for navigation -->



	<script src="js/jquery-1.11.1.min.js"></script>
	<script src="http://maps.google.com/maps/api/js?sensor=false&amp;language=en"></script>
	<script src="js/plugins.js"></script>
	<script src="js/app.js"></script>

</body>

</html>