<!DOCTYPE html>
<html lang="en">
<head>
	<title>Sign up</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
<!--===============================================================================================-->	
	<link rel="icon" type="image/png" href="images/icons/favicon.ico"/>
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/bootstrap/css/bootstrap.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="fonts/font-awesome-4.7.0/css/font-awesome.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="fonts/iconic/css/material-design-iconic-font.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/animate/animate.css">
<!--===============================================================================================-->	
	<link rel="stylesheet" type="text/css" href="vendor/css-hamburgers/hamburgers.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/animsition/css/animsition.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/select2/select2.min.css">
<!--===============================================================================================-->	
	<link rel="stylesheet" type="text/css" href="vendor/daterangepicker/daterangepicker.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="styles/util.css">
	<link rel="stylesheet" type="text/css" href="styles/main.css">
<!--===============================================================================================-->
</head>
<body>

	<div class="limiter">
		<div class="container-login100" style="background-image: url('images/bg-01.jpg');">
			<div class="wrap-login100 p-l-55 p-r-55 p-t-65 p-b-54">
				<form action="SignupValidation.php" method="POST">
					<span class="login100-form-title p-b-49">
						Sign up
					</span>
					<?php
					if(isset($_GET['error'])){
						if($_GET['error']=="emptyfields"){
							echo'<p> Fill in all fields!</p>';
						} else if($_GET['error']=="invalidemail&user"){
							echo'<p> Invalid username and email!</p>';
						} else if($_GET['error']=="invaliduser"){
							echo'<p> Invalid username!</p>';
						} else if($_GET['error']=="invalidemail"){
							echo'<p> Invalid email!</p>';
						} else if($_GET['error']=="passwordcheck"){
							echo'<p> Password does not match!</p>';
						} else if($_GET['error']=="usertaken"){
							echo'<p> User is already taken!</p>';
						} else if($_GET['error']=="passwordlen"){
							echo'<p> Password should have a length of minimum 8!</p>';
					}} 
					?>
					<div>
						<span class="label-input100">Username</span>
						<input class="input100" type="text" name="user" placeholder="Type your username">
						
						<span class="focus-input100" data-symbol="&#xf206;"></span>
                    </div>
                    <div>
						<span class="label-input100">Email</span>
						<input class="input100" type="email" name="email" placeholder="Type your email">
						
						<span class="focus-input100" data-symbol="&#xf206;"></span>
					</div>

					<div>
						<span class="label-input100">Password</span>
						<input class="input100" type="password" name="pass" placeholder="Type your password">
						
						<span class="focus-input100" data-symbol="&#xf190;"></span>
                    </div>

                    <div>
						<span class="label-input100">Verify Password</span>
						<input class="input100" type="password" name="pass1" placeholder="Type Password Again">
						 <?php if(isset($pass1_error)) {?>
						<p> <?php echo $pass1_error ?> </p>
						<?php } ?> 
						<span class="focus-input100" data-symbol="&#xf190;"></span>
					</div>
					
					
					<div class="container-login100-form-btn">
						<div class="wrap-login100-form-btn">
							<div class="login100-form-bgbtn"></div>
							<button class="login100-form-btn">
								Sign up
							</button>
						</div>
					</div>

					<div class="flex-c-m">
						<a href="#" class="login100-social-item bg1">
							<i class="fa fa-facebook"></i>
						</a>
						<a href="#" class="login100-social-item bg3">
							<i class="fa fa-google"></i>
						</a>
                    </div>
                    
                    <div class="flex-col-c p-t-155">
						

						<a href="Login.php" class="txt2">
							Already have an account? Log in
						</a>
					</div>

				</form>
			</div>
		</div>
	</div>
	

	<div id="dropDownSelect1"></div>
	
<!--===============================================================================================-->
	<script src="vendor/jquery/jquery-3.2.1.min.js"></script>
<!--===============================================================================================-->
	<script src="vendor/animsition/js/animsition.min.js"></script>
<!--===============================================================================================-->
	<script src="vendor/bootstrap/js/popper.js"></script>
	<script src="vendor/bootstrap/js/bootstrap.min.js"></script>
<!--===============================================================================================-->
	<script src="vendor/select2/select2.min.js"></script>
<!--===============================================================================================-->
	<script src="vendor/daterangepicker/moment.min.js"></script>
	<script src="vendor/daterangepicker/daterangepicker.js"></script>
<!--===============================================================================================-->
	<script src="vendor/countdowntime/countdowntime.js"></script>
<!--===============================================================================================-->
	<script src="JS/main.js"></script>

</body>
</html>