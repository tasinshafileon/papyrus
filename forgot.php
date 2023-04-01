<?php
/* Reset your password form, sends reset.php password link */
require 'db.php';
session_start();

// Check if form submitted with method="post"
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
	$email = $mysqli->escape_string($_POST['email']);
	$result = $mysqli->query("SELECT * FROM users WHERE email='$email'");

	if ($result->num_rows == 0) // User doesn't exist
	{
		$_SESSION['message'] = "User with that email doesn't exist!";
		require "error.php";
	} else { // User exists (num_rows != 0)

		$user = $result->fetch_assoc(); // $user becomes array with user data

		$email = $user['email'];
		$hash = $user['hash'];
		$first_name = $user['first_name'];

		// Session message to display on success.php
		$_SESSION['message'] = "<p>Please check your email <span>$email</span>"
			. " for a confirmation link to complete your password reset!</p>";

		// Send registration confirmation link (reset.php)
		$to      = $email;
		$subject = 'Password Reset Link ( clevertechie.com )';
		$message_body = '
        Hello ' . $first_name . ',

        You have requested password reset!

        Please click this link to reset your password:

        '.url().'/reset.php?email=' . $email . '&hash=' . $hash;

		mail($to, $subject, $message_body);

		require "success.php";
	}
}

function url()
{
	return sprintf(
		"%s://%s%s",
		isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] != 'off' ? 'https' : 'http',
		$_SERVER['SERVER_NAME'],
		$_SERVER['REQUEST_URI']
	);
}
?>
<!DOCTYPE html>
<html>

<head>
	<title>Reset Your Password</title>
	<?php include 'css/css.html'; ?>
</head>

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

	<div id="form" class="form">

		<h1>Reset Your Password</h1>

		<form action="forgot.php" method="post">
			<div class="field-wrap">
				<label>
					Email Address<span class="req">*</span>
				</label>
				<input type="email" required autocomplete="off" name="email" />
			</div>
			<button class="button button-block" />Reset</button>
		</form>
	</div>

	<script src='js/jquery.min.js'></script>
	<script src="js/index.js"></script>
</body>

</html>