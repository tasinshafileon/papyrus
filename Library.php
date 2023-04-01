<?php
require 'db.php';
/* Displays user information and some useful messages */
session_start();

//call query method of $mysqli object
$result = $mysqli->query
	//SELECT queries are always return as mysqli result objects
	("SELECT * FROM book WHERE available=1 ORDER BY rand()")
	or die($mysqli->error);

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
<title>Papyrus | Library</title>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="css/w3.css">
<link rel="stylesheet" href="css/w3-theme-blue-grey.css">
<link rel="stylesheet" href="css/style.css">
<link rel="stylesheet" href="font-awesome-4.7.0/css/font-awesome.min.css">
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto">
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Montserrat">
<link rel='stylesheet' href='https://fonts.googleapis.com/css?family=Open+Sans'>
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Raleway">
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Karma">
<style>
	#myInput {
		color: #000;
		text-align: center;
		width: 95%;
		font-size: 16px;
		padding: 12px 20px 12px 40px;
		border: 1px solid #000;
		margin-bottom: 12px;
		margin-left: 2.5%;
	}

	html,
	body,
	h1,
	h2,
	h3,
	h4,
	h5 {
		font-family: "Open Sans", sans-serif
	}
</style>

<body class="w3-theme-l4 w3-content" style="max-width:1600px">

	<div class="w3-top">
		<div class="w3-bar w3-black w3-left-align w3-large">
			<a class="w3-bar-item w3-button w3-hide-medium w3-hide-large w3-right w3-padding-large w3-hover-black w3-large w3-black w3-hover-text-red" href="javascript:void(0);" onclick="openNav()"><i class="fa fa-bars"></i></a>
			<a href="homepage.php" class="w3-bar-item w3-button w3-padding-large w3-black w3-hover-blue w3-text-red" style="width: 300px">PAPYRUS</a>
			<div class="w3-dropdown-hover w3-hide-small">
				<button class="w3-button w3-hide-small w3-padding-large w3-hover-blue" title="Messages"><i class="fa fa-envelope"></i><span class="w3-badge w3-right w3-small w3-red">4</span></button>
				<div class="w3-dropdown-content w3-card-4 w3-bar-block" style="width:300px;">
					<a href="Message.html" class="w3-small w3-bar-item w3-button w3-text-blue w3-right-align w3-hover-none w3-text-black w3-hover-text-red">Read All Messages</a>
					<a href="#" class="w3-bar-item w3-button w3-hover-red">
						<p class="w3-text-black w3-small"><b>Chowdhury Rabith Amin</b></p>
						<p class="w3-right w3-small w3-text-black">Ki obostha programmer?</p>
					</a>
					<a href="#" class="w3-bar-item w3-button w3-hover-red">
						<p class="w3-text-black w3-small"><b>Abrar Baruque Aurko</b></p>
						<p class="w3-right w3-small w3-text-black">ek dine tor hoibo re shoron o hason raja</p>
					</a>
					<a href="#" class="w3-bar-item w3-button w3-hover-red">
						<p class="w3-text-black w3-small"><b>Muktadir Rabbi Shotej</b></p>
						<p class="w3-right w3-small w3-text-black">Raja Raja Raja, Dil mein kar aja</p>
					</a>
					<a href="#" class="w3-bar-item w3-button w3-hover-red">
						<p class="w3-text-black w3-small"><b>Tasin Shafi Leon</b></p>
						<p class="w3-right w3-small w3-text-black">Bhhagke, dun dun dun dun dun dun dun</p>
					</a>
				</div>

			</div>
			<div class="w3-dropdown-hover w3-hide-small">
				<button class="w3-button w3-hide-small w3-padding-large w3-hover-blue" title="Notifications"><i class="fa fa-bell"></i><span class="w3-badge w3-right w3-small w3-red">3</span></button>
				<div class="w3-dropdown-content w3-card-4 w3-bar-block" style="width:300px">
					<a href="#" class="w3-bar-item w3-button w3-hover-red">One new friend request</a>
					<a href="#" class="w3-bar-item w3-button w3-hover-red">John Doe posted on your wall</a>
					<a href="#" class="w3-bar-item w3-button w3-hover-red">Jane likes your post</a>
				</div>
			</div>
			<a href="library.php" class="w3-bar-item w3-button w3-hide-small w3-padding-large w3-hover-blue" title="library"><i class="fa fa-book"></i></a>
			<div class="w3-dropdown-hover w3-hide-small w3-right">
				<button class="w3-button w3-hide-small w3-padding-large w3-hover-blue" title="Account"><img src="img/avatar.jpg" class="w3-circle" style="height:25px;width:25px" alt="Avatar"></button>
				<div class="w3-dropdown-content w3-card-4 w3-bar-block" style="right: 0;width:300px">
					<a href="account.php" class="w3-bar-item w3-button w3-hover-red"><?php echo $first_name . ' ' . $last_name; ?></a>
					<a href="#" class="w3-bar-item w3-button w3-hover-red">Account Settings</a>
					<a href="logout.php" class="w3-bar-item w3-button w3-hover-red">Logout</a>
				</div>
			</div>
		</div>
	</div>

	<input type="text" id="myInput" onkeyup="myFunction()" placeholder="Search for Books" title="Type in a name" style=" margin-top: 60px">

	<!-- Book Grid Start-->
	<div class="w3-row-padding w3-padding-16 w3-center" id="myBooks">
		<?php while ($book = $result->fetch_assoc()) : ?>
			<div class="w3-quarter">
				<a href="<?= $book['pdf'] ?>" style="color: black" class="w3-hover-shadow w3-hover-opacity w3-hover-text-red">
					<img src="<?= $book['image'] ?>" alt="<?= $book['book_name'] ?>" style="height: 400px; width: 260px">
					<h3><?= $book['book_name'] ?></h3>
					<h5>Author: <i><?= $book['author'] ?></i></h5>
					<h5>Publish Date: <i><?= $book['publish_date'] ?></i></h5>
					<h5>Price: ৳<i><?= $book['price'] ?></i></h5>
				</a>
			</div><?php endwhile; ?>
	</div>
	<!-- Book Grid end-->


	<footer class="w3-container w3-theme-d5">
		<p>Powered by <a href="homepage.html" target="_blank">Papyrus</a></p>
	</footer>

	<script>
		function myFunction() {
			var input, filter, body, div, h3, i;
			input = document.getElementById("myInput");
			filter = input.value.toUpperCase();
			body = document.getElementById("myBooks");
			div = body.getElementsByTagName("div");
			for (i = 0; i < div.length; i++) {
				h3 = div[i].getElementsByTagName("h3")[0];
				if (h3) {
					if (h3.innerHTML.toUpperCase().indexOf(filter) > -1) {
						div[i].style.display = "";
					} else {
						div[i].style.display = "none";
					}
				}
			}
		}
	</script>

</body>

</html>