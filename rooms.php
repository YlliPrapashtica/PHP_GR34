<!DOCTYPE html>
<html lang="en">
<head>
<title>Rooms</title>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="description" content="Marimar Hotel template project">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" type="text/css" href="styles/bootstrap-4.1.2/bootstrap.min.css">
<link href="plugins/font-awesome-4.7.0/css/font-awesome.min.css" rel="stylesheet" type="text/css">
<link rel="stylesheet" type="text/css" href="plugins/OwlCarousel2-2.3.4/owl.carousel.css">
<link rel="stylesheet" type="text/css" href="plugins/OwlCarousel2-2.3.4/owl.theme.default.css">
<link rel="stylesheet" type="text/css" href="plugins/OwlCarousel2-2.3.4/animate.css">
<link href="plugins/jquery-datepicker/jquery-ui.css" rel="stylesheet" type="text/css">
<link rel="stylesheet" type="text/css" href="styles/rooms.css">
<link rel="stylesheet" type="text/css" href="styles/rooms_responsive.css">
</head>
<body>

<div class="super_container">
	
	<!-- Header -->

	<?php
		include('header.php')
	?>
	<!-- Logo Overlay -->

	<div class="logo_overlay">
		<div class="logo_overlay_content d-flex flex-column align-items-center justify-content-center">
			<div class="logo"><a href="#"><img src="images/logo_3.png" alt=""></a></div>
		</div>
	</div>

	<!-- Menu Overlay -->

	<div class="menu_overlay">
		<div class="menu_overlay_content d-flex flex-row align-items-center justify-content-center">
			
			<!-- Hamburger Button -->
			<div class="hamburger"><i class="fa fa-bars" aria-hidden="true"></i></div>

		</div>
	</div>

	<!-- Menu -->

	<div class="menu">
		<div class="menu_container d-flex flex-column align-items-center justify-content-center">

			<!-- Menu Navigation -->
			<nav class="menu_nav text-center">
				<ul>
					<li><a href="index.php">Home</a></li>
					<li><a href="about.php">About us</a></li>
					<li><a href="rooms.php">Rooms</a></li>
					<li><a href="contact.php">Contact</a></li>
				</ul>
			</nav>
			<div class="button menu_button"><a href="booking.php">Book now</a></div>

			<!-- Menu Social -->
			<div class="social menu_social">
				<ul class="d-flex flex-row align-items-center justify-content-start">
					<li><a href="#"><i class="fa fa-pinterest" aria-hidden="true"></i></a></li>
					<li><a href="#"><i class="fa fa-facebook" aria-hidden="true"></i></a></li>
					<li><a href="#"><i class="fa fa-twitter" aria-hidden="true"></i></a></li>
					<li><a href="#"><i class="fa fa-dribbble" aria-hidden="true"></i></a></li>
					<li><a href="#"><i class="fa fa-behance" aria-hidden="true"></i></a></li>
				</ul>
			</div>

		</div>
	</div>

	<!-- Home -->

	<div class="home">
		<div class="parallax_background parallax-window" data-parallax="scroll" data-image-src="images/rooms.jpg" data-speed="0.8"></div>
		<div class="home_container d-flex flex-column align-items-center justify-content-center">
			<div class="home_title"><h1>Rooms</h1></div>
		</div>
	</div>

	
	<!-- Rooms -->

	<div class="rooms">
		<div class="container">
			<div class="row">
				<div class="col">
					<div class="card-columns">
						
						<!-- Room -->
						<div class="card">
							<img class="card-img-top" src="images/room_1.jpg" alt="Room image description">
							<div class="card-body">
							<?php
							require "connect.php";
								$sql = "SELECT room_type_name,room_cost,room_type_description,room_type_id  FROM room_type WHERE room_type_id=1";
								$result = mysqli_query($con,$sql);
										
									while ($row = mysqli_fetch_array ($result)){
									echo('<div class="rooms_title"><h2>'.$row['room_type_name'].'</h2></div>');
							echo('<div class="rooms_text">');
							echo('<p>'.$row['room_type_description'].'</p>');
							echo ('</div>');
								
								echo ('<div class="rooms_price">'.$row['room_cost'].'/<span>Night</span></div>');
								echo ('<div class="button rooms_button"><a href="booking.php">Book now</a></div>');
					
								  }
								
								?>
									</div>
						</div>
						<!-- Room -->
						<div class="card">
							<img class="card-img-top" src="images/room_2.jpg" alt="Room image description">
							<div class="card-body">
							<?php
							require "connect.php";
								$sql = "SELECT room_type_name,room_cost,room_type_description,room_type_id  FROM room_type WHERE room_type_id=2";
								$result = mysqli_query($con,$sql);
										
									while ($row = mysqli_fetch_array ($result)){
									echo('<div class="rooms_title"><h2>'.$row['room_type_name'].'</h2></div>');
							echo('<div class="rooms_text">');
							echo('<p>'.$row['room_type_description'].'</p>');
							echo ('</div>');
								
								echo ('<div class="rooms_price">'.$row['room_cost'].'/<span>Night</span></div>');
								echo ('<div class="button rooms_button"><a href="booking.php">Book now</a></div>');
					
								  }
								
								?>
							</div>
						</div>

						<!-- Room -->
						<div class="card">
							<img class="card-img-top" src="images/room_3.jpg" alt="Room image description">
							<div class="card-body">
							<?php
							require "connect.php";
								$sql = "SELECT room_type_name,room_cost,room_type_description,room_type_id  FROM room_type WHERE room_type_id=3";
								$result = mysqli_query($con,$sql);
										
									while ($row = mysqli_fetch_array ($result)){
									echo('<div class="rooms_title"><h2>'.$row['room_type_name'].'</h2></div>');
							echo('<div class="rooms_text">');
							echo('<p>'.$row['room_type_description'].'</p>');
							echo ('</div>');
								
								echo ('<div class="rooms_price">'.$row['room_cost'].'/<span>Night</span></div>');
								echo ('<div class="button rooms_button"><a href="booking.php">Book now</a></div>');
					
								  }
								
								?>
							</div>
						</div>

						<!-- Room -->
						<div class="card card-special">
							<img class="card-img-top" src="images/room_4.jpg" alt="Room image description">
							<div class="card-special-panel">special offer</div>
							<div class="card-body">
							<?php
							require "connect.php";
								$sql = "SELECT room_type_name,room_cost,room_type_description,room_type_id  FROM room_type WHERE room_type_id=4";
								$result = mysqli_query($con,$sql);
										
									while ($row = mysqli_fetch_array ($result)){
									echo('<div class="rooms_title"><h2>'.$row['room_type_name'].'</h2></div>');
							echo('<div class="rooms_text">');
							echo('<p>'.$row['room_type_description'].'</p>');
							echo ('</div>');
								
								echo ('<div class="rooms_price">'.$row['room_cost'].'/<span>Night</span></div>');
								echo ('<div class="button rooms_button"><a href="booking.php">Book now</a></div>');
					
								  }
								
								?>
							</div>
						</div>

					</div>

					
				</div>
			</div>
		</div>		
	</div>

	<!-- Footer -->

	<footer class="footer">
		<div class="parallax_background parallax-window" data-parallax="scroll" data-image-src="images/footer.jpg" data-speed="0.8"></div>
		<div class="container">
			<div class="row">
				<div class="col">
					<div class="footer_logo text-center">
						<a href="#"><img src="images/logo.png" alt=""></a>
					</div>
					<div class="footer_content">
						<div class="row">
							<div class="col-lg-4 footer_col">
								<div class="footer_info d-flex flex-column align-items-lg-end align-items-center justify-content-start">
									<div class="text-center">
										<div>Phone:</div>
										<div>+546 990221 123</div>
									</div>
								</div>
							</div>
							<div class="col-lg-4 footer_col">
								<div class="footer_info d-flex flex-column align-items-center justify-content-start">
									<div class="text-center">
										<div>Address:</div>
										<div>Main Str, no 23, New York</div>
									</div>
								</div>
							</div>
							<div class="col-lg-4 footer_col">
								<div class="footer_info d-flex flex-column align-items-lg-start align-items-center justify-content-start">
									<div class="text-center">
										<div>Mail:</div>
										<div>hotel@contact.com</div>
									</div>
								</div>
							</div>
						</div>
					</div>
					
			</div>
		</div>
	</footer>
</div>

<script src="js/jquery-3.3.1.min.js"></script>
<script src="styles/bootstrap-4.1.2/popper.js"></script>
<script src="styles/bootstrap-4.1.2/bootstrap.min.js"></script>
<script src="plugins/greensock/TweenMax.min.js"></script>
<script src="plugins/greensock/TimelineMax.min.js"></script>
<script src="plugins/scrollmagic/ScrollMagic.min.js"></script>
<script src="plugins/greensock/animation.gsap.min.js"></script>
<script src="plugins/greensock/ScrollToPlugin.min.js"></script>
<script src="plugins/OwlCarousel2-2.3.4/owl.carousel.js"></script>
<script src="plugins/easing/easing.js"></script>
<script src="plugins/progressbar/progressbar.min.js"></script>
<script src="plugins/parallax-js-master/parallax.min.js"></script>
<script src="plugins/jquery-datepicker/jquery-ui.js"></script>
<script src="js/rooms.js"></script>
</body>
</html>