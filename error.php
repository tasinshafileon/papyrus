<?php
/* Displays all error messages */
session_start();
?>
<!DOCTYPE html>
<html>

<head>
	<title>Error</title>
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

	<div class="form">
		<h1>Error</h1>
		<p style="color: white; text-align: center">
			<?php
			if (isset($_SESSION['message']) and !empty($_SESSION['message'])) :
				echo $_SESSION['message'];
			else :
				require "index.php";
			endif;
			?>
		</p>
		<a href="index.php"><button class="button button-block" />Home</button></a>
	</div>
</body>

</html>