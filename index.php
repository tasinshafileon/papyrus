<?php
/* Main page with two forms: sign up and log in */
require 'db.php';
session_start();
?>
<!DOCTYPE html>
<html>

<head>
	<title>Papyrus | Log in | Sign Up</title>
</head>

<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
	if (isset($_POST['login'])) { //user logging in
		
		require 'login.php';

	} elseif (isset($_POST['register'])) { //user registering

		require 'register.php';
	}
}
?>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="css/w3.css">
<link rel="stylesheet" href="css/normalize.min.css">
<link rel="stylesheet" href="css/style.css">
<link rel="stylesheet" href="font-awesome-4.7.0/css/font-awesome.min.css"">
<link rel='stylesheet' href='https://fonts.googleapis.com/css?family=Titillium+Web:400,300,600'  type='text/css'>
<link rel=" stylesheet" href="https://fonts.googleapis.com/css?family=Lato">
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Montserrat">

<style>
	body,
	h1,
	h2,
	h3,
	h4,
	h5,
	h6 {
		font-family: "Lato", sans-serif
	}

	.w3-bar,
	h1,
	button {
		font-family: "Montserrat", sans-serif
	}
</style>

<body>

	<!-- Navbar -->
	<div class="w3-top">
		<div class="w3-bar w3-black w3-justify">
			<p align="center"><img src="img/logo2-white.png" alt="PAPYRUS" height="70" width="90"></p>
		</div>

		<!-- Navbar on small screens -->
		<div id="navDemo" class="w3-bar-block w3-white w3-hide w3-hide-large w3-hide-medium w3-large">
			<p align="center" style="font-size: 30px"><b>PAPYRUS</b></p>
		</div>
	</div>


	<!-- Header -->
	<header class="w3-container w3-center w3-xlarge" style="padding:325px 16px; background-image: url(img/Login_Header.jpg); min-height: 100%;position: relative; opacity: 0.65; background-attachment: fixed; background-position: 0px -250px; background-repeat: no-repeat">
		<div style="position: absolute; left: 0px; top: 50%; width: 100%; text-align: center; color: #000;">
			<a href="#form" class="w3-bar-item w3-button w3-red w3-hide-small w3-padding-large w3-margin-right w3-hover-blue" style="background-color: red; color: #fff; padding: 10px; font-size: 20px">LET'S GO</a>
		</div>
	</header>

	<div id="form" class="form">

		<ul class="tab-group">
			<li class="tab"><a href="#signup">Sign Up</a></li>
			<li class="tab active"><a href="#login">Log In</a></li>
		</ul>

		<div class="tab-content">

			<div id="login">
				<h1>Welcome Back!</h1>

				<form action="index.php" method="post" autocomplete="off">

					<div class="field-wrap">
						<label>
							Email Address<span class="req">*</span>
						</label>
						<input type="email" required autocomplete="off" name="email" />
					</div>

					<div class="field-wrap">
						<label>
							Password<span class="req">*</span>
						</label>
						<input type="password" required autocomplete="off" name="password" />
					</div>

					<p class="forgot"><a href="forgot.php" class="w3-hover-text-blue w3-text-red">Forgot Password?</a></p>

					<button class="button button-block" name="login" />Log In</button>

				</form>

			</div>

			<div id="signup">
				<h1>Sign Up for Free!</h1>

				<form action="index.php" method="post" autocomplete="off">

					<div class="top-row">
						<div class="field-wrap">
							<label>
								First Name<span class="req">*</span>
							</label>
							<input type="text" required autocomplete="off" name='firstname' />
						</div>

						<div class="field-wrap">
							<label>
								Last Name<span class="req">*</span>
							</label>
							<input type="text" required autocomplete="off" name='lastname' />
						</div>
					</div>

					<div class="field-wrap">
						<label>
							Email Address<span class="req">*</span>
						</label>
						<input type="email" required autocomplete="off" name='email' />
					</div>

					<div class="field-wrap">
						<label>
							Set A Password<span class="req">*</span>
						</label>
						<input type="password" required autocomplete="off" name='password' />
					</div>

					<button type="submit" class="button button-block" name="register" />Register</button>

				</form>

			</div>

		</div><!-- tab-content -->

	</div> <!-- /form -->

	<!-- Second Grid -->
	<div class="w3-row-padding w3-light-grey w3-padding-64 w3-container">
		<div class="w3-content">
			<div class="w3-third w3-center">
				<i class=" w3-padding-64 w3-text-red w3-margin-right"><img src="img/logo-red.png" alt="PAPYRUS" height="350" width="300" style="padding-top: 100px"></i>
			</div>

			<div class="w3-twothird">
				<h1 style="color: #000000"><i>About Us</i></h1>
				<h5 class="w3-padding-32">Papyrus is an online library marketplace and discussion hub that brings bookworms together!</h5>

				<p class="w3-text-grey">Open communication was the key-goal while developing this web-site. Free speech and un-biased criticism is appreciated in this platform. Book readers will find this web-site very easy to navigate, participate and communicate. Papyrus encourages users to read more and to be active on the large book reader's community</p>
			</div>
		</div>
	</div>

	<div class="w3-container w3-red w3-center w3-padding-64">
		<h1 class="w3-margin w3-xlarge">Quote of the day: live life</h1>
	</div>

	<!-- Footer -->
	<footer class="w3-container w3-padding-64 w3-center w3-opacity">
		<div class="w3-xlarge w3-padding-32">
			<i class="fa fa-facebook-official w3-hover-opacity" style="color: #3b5998"></i>
			<i class="fa fa-instagram w3-hover-opacity" style="color: #e95950"></i>
			<i class="fa fa-twitter w3-hover-opacity" style="color: #55acee"></i>
			<i class="fa fa-snapchat w3-hover-opacity" style="color: #fffc00 "></i>
			<i class="fa fa-linkedin w3-hover-opacity" style="color: #007bb5"></i>
			<i class="fa fa-pinterest-p w3-hover-opacity" style="color: #cb2027"></i>
		</div>
		<p style="color: #ffffff">Powered by: LEON, RABITH, AURKO, SHOTEJ</p>
	</footer>

	<script src='js/jquery.min.js'></script>
	<script src="js/index.js"></script>

</body>

</html>