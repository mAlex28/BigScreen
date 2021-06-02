<?php
session_start();
include('dbconfig.php');
?>

<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0,maximum-scale=1">

	<title>Movie Review</title>

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
				if (isset( $_SESSION['username'])) { ?>
					<div class="main-navigation">
						<button type="button" class="menu-toggle"><i class="fa fa-bars"></i></button>
						<ul class="menu">
							<li class="menu-item current-menu-item"><a href="index.php">Home</a></li>
							<li class="menu-item"><a href="about.php">About</a></li>
							<li class="menu-item"><a href="review.php">Movie reviews</a></li>
							<li class="menu-item"><a href="news.php">News</a></li>
							<li class="menu-item">
								<div class="dropdown">
									<a class="dropbtn"><?php echo $_SESSION['username']; ?>
										<i class="fa fa-caret-down"></i>
									</a>
									<div class="dropdown-content">
										<form action="logout.php" method="POST">

											<button type="submit" name="logoutBtn">
												<a href="#">Logout</a>
											</button>
										</form>
										<a href="#">Profile</a>
									</div>
								</div>
							</li>
							<li class="menu-item"><a href="contact.php">Contact</a></li>
						</ul> <!-- .menu -->
						<form action="#" class="search-form">
							<input type="text" name="name" placeholder="Search...">
							<button type="submit" name="searchBtn"><i class="fa fa-search"></i></button>
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
							<li class="menu-item"><a href="contact.php">Contact</a></li>
						</ul> <!-- .menu -->
						<form action="searchmovie.php" method="POST" class="search-form">
							<input type="text" name="name" placeholder="Search...">
							<button type="submit" name="searchBtn"><i class="fa fa-search"></i></button>
						</form>
					</div> <!-- .main-navigation -->
				<?php } ?>

				<div class="mobile-navigation"></div>
			</div>
		</header>
		<main class="main-content">
			<div class="container">
				<div class="page">
					<div class="row">
						<div class="col-md-9">
							<?php

							$query = "SELECT * FROM movies ORDER BY mid DESC LIMIT 3";
							$query_run = mysqli_query($con, $query);
							?>
							<div class="slider">
								<ul class="slides">
									<?php
									if (mysqli_num_rows($query_run) > 0) {
										while ($row = mysqli_fetch_assoc($query_run)) {
									?>
											<li><a href="#"><?php echo '<img src="admin/upload/' . $row['poster'] . '" alt="image">' ?></a></li>
									<?php
										}
									} else {
										echo "No record found";
									}
									?>
								</ul>
							</div>
						</div>


						<div class="col-md-3">
							<div class="row">
								<?php

								$query = "SELECT * FROM movies ORDER BY imdb DESC LIMIT 3";
								$query_run = mysqli_query($con, $query);
								if (mysqli_num_rows($query_run) > 0) {
									while ($row = mysqli_fetch_assoc($query_run)) {
								?>
										<div class="col-sm-6 col-md-12">
											<div class="latest-movie">
												<a href="#"><?php echo '<img src="admin/upload/' . $row['poster'] . '" alt="image">' ?></a>
											</div>
										</div>
								<?php
									}
								} else {
									echo "No record found";
								}
								?>
							</div>
						</div>
					</div> <!-- .row -->


					<div class="row">
						<?php

						$query = "SELECT * FROM movies ORDER BY imdb ASC LIMIT 4";
						$query_run = mysqli_query($con, $query);
						if (mysqli_num_rows($query_run) > 0) {
							while ($row = mysqli_fetch_assoc($query_run)) {
						?>
								<div class="col-sm-6 col-md-3">
									<div class="latest-movie">
										<a href="#"><?php echo '<img src="admin/upload/' . $row['poster'] . '" alt="image">' ?></a>

									</div>
								</div>
						<?php
							}
						} else {
							echo "No record found";
						}
						?>
					</div> <!-- .row -->

					<div class="row">
						<div class="col-md-4">
							<h2 class="section-title">May premiere</h2>
							<p>Find out the latest movies released this month</p>
							<ul class="movie-schedule">
								<li>
									<div class="date">07/05</div>
									<h2 class="entry-title"><a href="#">Wrath of Man</a></h2>
								</li>
								<li>
									<div class="date">21/05</div>
									<h2 class="entry-title"><a href="#">New Order</a></h2>
								</li>
								<li>
									<div class="date">21/05</div>
									<h2 class="entry-title"><a href="#">American Fighter</a></h2>
								</li>
								<li>
									<div class="date">28/05</div>
									<h2 class="entry-title"><a href="#">American Traitor</a></h2>
								</li>
							</ul> <!-- .movie-schedule -->
						</div>
						<div class="col-md-4">
							<h2 class="section-title">June premiere</h2>
							<p>Upcoming movies for the next month</p>
							<ul class="movie-schedule">
								<li>
									<div class="date">04/06</div>
									<h2 class="entry-title"><a href="#">The Conjuring</a></h2>
								</li>
								<li>
									<div class="date">11/06</div>
									<h2 class="entry-title"><a href="#">The Misfits</a></h2>
								</li>
								<li>
									<div class="date">18/06</div>
									<h2 class="entry-title"><a href="#">Peter Rabbit 2</a></h2>
								</li>
								<li>
									<div class="date">25/06</div>
									<h2 class="entry-title"><a href="#">Fast & Furious 9</a></h2>
								</li>
							</ul> <!-- .movie-schedule -->
						</div>
						<div class="col-md-4">
							<h2 class="section-title">July premiere</h2>
							<p>Movies that are set to release on July</p>
							<ul class="movie-schedule">
								<li>
									<div class="date">02/07</div>
									<h2 class="entry-title"><a href="#">The Forever Purge</a></h2>
								</li>
								<li>
									<div class="date">02/07</div>
									<h2 class="entry-title"><a href="#">Summer of Soul</a></h2>
								</li>
								<li>
									<div class="date">09/07</div>
									<h2 class="entry-title"><a href="#">Black Widow</a></h2>
								</li>
								<li>
									<div class="date">14/07</div>
									<h2 class="entry-title"><a href="#">Gunpowder Milkshake</a></h2>
								</li>
							</ul> <!-- .movie-schedule -->
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
	<script src="js/plugins.js"></script>
	<script src="js/app.js"></script>

</body>

</html>