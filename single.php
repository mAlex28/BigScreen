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

	<title>Movie Review | Single</title>

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
				if (isset($_SESSION['username'])) {
					$uemail = $_SESSION['username'];
					$userquery = "SELECT * FROM users WHERE email = '$uemail'";
					$userquery_run = mysqli_query($con, $userquery);

					if (mysqli_num_rows($userquery_run) > 0) {
						while ($data = mysqli_fetch_assoc($userquery_run)) {
				?>

							<div class="main-navigation">
								<button type="button" class="menu-toggle"><i class="fa fa-bars"></i></button>
								<ul class="menu">
									<li class="menu-item"><a href="index.php">Home</a></li>
									<li class="menu-item"><a href="about.php">About</a></li>
									<li class="menu-item current-menu-item"><a href="review.php">Movie reviews</a></li>
									<li class="menu-item"><a href="news.php">News</a></li>
									<li class="menu-item"><a href="#"><?php echo $data['username']; ?></a></li>
									<li class="menu-item"><a href="contact.php">Contact</a></li>
								</ul> <!-- .menu -->
								<form action="#" class="search-form">
									<input type="text" placeholder="Search...">
									<button><i class="fa fa-search"></i></button>
								</form>
							</div> <!-- .main-navigation -->
							<input id="userid" type="hidden" value="<?php echo $data['id']; ?>">

					<?php 	}
					} else {
						echo 'Error';
					}
				} else { ?>
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
					<?php
					$movieid = $_GET['movieid'];

					$query = "SELECT * FROM movies WHERE mid = $movieid";
					$query_run = mysqli_query($con, $query);

					if (mysqli_num_rows($query_run) > 0) {
						while ($row = mysqli_fetch_assoc($query_run)) {
					?>
							<div class="breadcrumbs">
								<a href="index.php">Home</a>
								<a href="review.php">Movie Review</a>
								<span><?php echo $row['mname'];  ?></span>
							</div>

							<div class="content">

								<div class="row">
									<div class="col-md-6">
										<figure class="movie-poster"><?php echo '<img src="admin/upload/' . $row['poster'] . '" alt="image">' ?></figure>
									</div>
									<div class="col-md-6">
										<h2 class="movie-title"><?php echo $row['mname'];  ?></h2>
										<div class="movie-summary">
											<p><?php echo $row['description'];  ?></p>

										</div>
										<ul class="movie-meta">
											<li><strong>Rating:</strong>
												<?php echo $row['ratings'];  ?>
												<!-- <div class="star-rating" title="Rated 4.00 out of 5"><span style="width:80%"><strong class="rating">4.00</strong> out of 5</span></div> -->
											</li>
											<li><strong>IMDB:</strong> <?php echo $row['imdb'];  ?></li>
											<li><strong>Year:</strong> <?php echo $row['myear'];  ?></li>
											<li><strong>Category:</strong> <?php echo $row['category'];  ?></li>
											<input type="hidden" id="ratemovieid" value="<?php echo $movieid; ?>">

										</ul>
									</div>
								</div> <!-- .row -->

								<div class="entry-content">
									<?php
									if (isset($_SESSION['username'])) { ?>
										<div class="user-ratings">
											<i class="fa fa-star fa-2x" data-index="0"></i>
											<i class="fa fa-star fa-2x" data-index="1"></i>
											<i class="fa fa-star fa-2x" data-index="2"></i>
											<i class="fa fa-star fa-2x" data-index="3"></i>
											<i class="fa fa-star fa-2x" data-index="4"></i>
										</div>
										<div class="user-comments">
											<input type="text" name="comnt" class="user-comment">
											<button type="submit" name="commnetBtn">Comment</button>
										</div>
									<?php
									} else { ?>
										<div class="logToCmnt">
											<h2>You are not logged in</h2>
											<a href="joinus.php" class="logBtn">Log In to Comment</a>
										</div>
									<?php	} ?>

									<div class="view-comments">
										<?php
										$querycmnt = "SELECT * FROM comments WHERE movieId = $movieid";
										$querycmnt_run = mysqli_query($con, $querycmnt);

										$numcom = mysqli_num_rows($querycmnt_run);

										if ($numcom > 0) {
											while ($row = mysqli_fetch_assoc($querycmnt_run)) {

										?>
												<h3><?php echo $numcom; ?> Comments</h3>

												<?php
												$movie_id = $row['movieId'];
												$movie_name = "SELECT * FROM movies WHERE mid = '$movie_id'";
												$movie_name_run = mysqli_query($con, $movie_name);

												$user_id = $row['userId'];
												$user_name = "SELECT * FROM users WHERE id = '$user_id'";
												$user_name_run = mysqli_query($con, $user_name);
												?>

												<div class="comments">
													<div class='media-body'>
														<h4 class='media-heading'> <?php
																					foreach ($user_name_run as $user_row) {
																						echo $user_row['username'];
																					}
																					?></h4>
														<p class="media-cmnt">
															<?php echo $row['comment'];  ?>
														</p>
													</div>
												</div>
										<?php
											}
										} else {
											echo "No Comments";
										}
										?>
									</div>
								</div>
							</div>
					<?php
						}
					} else {
						echo "No record found";
					}
					?>
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
	<script>
		var ratedIndex = -1;
		var usid = $("#userid").val();
		var movieid = $("#ratemovieid").val();

		$(document).ready(function() {
			resetRatingColors();

			if (localStorage.getItem('ratedIndex') != null) {
				setStars(parseInt(localStorage.getItem('ratedIndex')));
				usid = localStorage.getItem('userid');
			}

			$('.fa-star').on('click', function() {
				ratedIndex = parseInt($(this).data('index'));
				localStorage.setItem('ratedIndex', ratedIndex);
				saveToDatabase();
			});

			$('.fa-star').mouseover(function() {
				resetRatingColors();
				var currentIndex = parseInt($(this).data('index'));
				setStars(currentIndex);

			});

			$('.fa-star').mouseleave(function() {
				resetRatingColors();
				if (ratedIndex != -1) {
					setStars(ratedIndex);
				}
			});

			function saveToDatabase() {
				$.ajax({
					url: "ratings.php",
					method: "POST",
					dataType: 'json',
					data: {
						save: 1,
						userid: usid,
						movieid: movieid,
						ratedIndex: ratedIndex
					},
					success: function(r) {
						usid = r.id;
						localStorage.setItem('userid', usid);
					}
				});
			}

			function setStars(max) {
				for (var i = 0; i <= max; i++) {
					$('.fa-star:eq(' + i + ')').css('color', '#ffaa3c');
				}
			}

			function resetRatingColors() {
				$('.fa-star').css('color', '#84878d');
			}
		})
	</script>
</body>

</html>