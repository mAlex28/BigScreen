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

	<title>Movie Review | Review</title>

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
							<li class="menu-item current-menu-item"><a href="review.php">Movie reviews</a></li>
							<li class="menu-item"><a href="news.php">News</a></li>
							<li class="menu-item"><a href="#"><?php echo $_SESSION['username']; ?></a></li>
							<li class="menu-item"><a href="contact.php">Contact</a></li>
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
							<li class="menu-item"><a href="index.php">Home</a></li>
							<li class="menu-item"><a href="about.php">About</a></li>
							<li class="menu-item current-menu-item"><a href="review.php">Movie reviews</a></li>
							<li class="menu-item"><a href="news.php">News</a></li>
							<li class="menu-item"><a href="joinus.php">Join Us</a></li>
							<li class="menu-item"><a href="contact.php">Contact</a></li>
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
						<span>Movie Review</span>
					</div>

					<div class="filters">
						<select name="#" id="#" placeholder="Choose Category">
							<option value="#">Action</option>
							<option value="#">Drama</option>
							<option value="#">Fantasy</option>
							<option value="#">Horror</option>
							<option value="#">Adventure</option>
						</select>
						<select name="#" id="#">
							<option value="#">2012</option>
							<option value="#">2013</option>
							<option value="#">2014</option>
						</select>
					</div>


					<div class="movie-list">
						<?php
						$moviename = $_GET['movie'];
					 echo $moviename; 
						$query = "SELECT * FROM movies";
						$query_run = mysqli_query($con, $query);
						if (mysqli_num_rows($query_run) > 0) {
							while ($row = mysqli_fetch_assoc($query_run)) {
						?>
								<div class="movie">
									<figure class="movie-poster"><?php echo '<img src="admin/upload/' . $row['poster'] . '" alt="image">' ?></figure>
									<div class="movie-title"><a href="single.php?movieid=<?php echo $row['mid'] ?>""><?php echo $row['mname'] ?> (<?php echo $row['myear'] ?>)</a></div>
							<p>IMDB: <?php echo $row['imdb'] ?> </p>
							<p>Category: <?php echo $row['category'] ?></p>
						</div>
						<?php
							}
						} else {
							echo "No record found";
						}
						?>
					</div> <!-- .movie-list -->

					<div class=" pagination">
						<a href="#" class="page-number prev"><i class="fa fa-angle-left"></i></a>
						<span class="page-number current">1</span>
						<a href="#" class="page-number">2</a>
						<a href="#" class="page-number">3</a>
						<a href="#" class="page-number">4</a>
						<a href="#" class="page-number">5</a>
						<a href="#" class="page-number next"><i class="fa fa-angle-right"></i></a>
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