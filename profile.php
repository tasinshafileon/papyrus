<?php
/* Displays user information and some useful messages */
session_start();

// Check if user is logged in using the session variable
if ($_SESSION['logged_in'] != 1) {
	$_SESSION['message'] = "You must log in before viewing your profile page!";
	require "error.php";
} else {
	// Makes it easier to read
	$first_name = $_SESSION['first_name'];
	$last_name = $_SESSION['last_name'];
	$email = $_SESSION['email'];
	$active = $_SESSION['active'];
}
?>
<!DOCTYPE html>
<html>

<head>
	<meta charset="UTF-8">
	<title>Welcome <?= $first_name . ' ' . $last_name ?></title>
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

	<div class="form" style="color: white; text-align: center">

		<h1>Welcome</h1>

		<p>
			<?php

			// Display message about account verification link only once
			if (isset($_SESSION['message'])) {
				echo $_SESSION['message'];

				// Don't annoy the user with more messages upon page refresh
				unset($_SESSION['message']);
			}

			?>
		</p>

		<?php

		// Keep reminding the user this account is not active, until they activate
		if (!$active) {
			echo
			'<div class="info">
              Account is unverified, please confirm your email by clicking
              on the email link!
              </div>';
		}

		?>

		<h2><?php echo $first_name . ' ' . $last_name; ?></h2>
		<p><?= $email ?></p>

		<a href="logout.php"><button class="button button-block" name="logout" />Log Out</button></a>

	</div>

	<script src='http://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script>
	<script src="js/index.js"></script>

</body>

</html>