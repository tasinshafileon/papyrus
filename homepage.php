<?php
require 'db.php';
/* Displays user information and some useful messages */
session_start();

//call query method of $mysqli object
$result = $mysqli->query 
        //SELECT queries are always return as mysqli result objects
        ("SELECT * FROM book WHERE available=1 ORDER BY rand() LIMIT 8") 
        or die($mysqli->error); 

$result2 = $mysqli->query 
        //SELECT queries are always return as mysqli result objects
        ("SELECT * FROM post_name ORDER BY time DESC") 
        or die($mysqli->error); 

// Check if user is logged in using the session variable
if ( $_SESSION['logged_in'] != 1 ) {
  $_SESSION['message'] = "You must log in before viewing your profile page!";
  header("location: error.php");    
}
else {
    // Makes it easier to read
    $first_name = $_SESSION['first_name'];
    $last_name = $_SESSION['last_name'];
    $email = $_SESSION['email'];
    $active = $_SESSION['active'];
}

?>
<!DOCTYPE html>
<html>
<title>Papyrus | Home</title>

<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST')
{
    if (isset($_POST['post_button'])) {
        
        require 'post.php';
        
    }
}
?>

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
html,body,h1,h2,h3,h4,h5 {font-family: "Open Sans", sans-serif}
</style>
<body class="w3-theme-l4 w3-content"  style="max-width:1600px">

    <div class="w3-top">
        <div class="w3-bar w3-black w3-left-align w3-large">
            <a class="w3-bar-item w3-button w3-hide-medium w3-hide-large w3-right w3-padding-large w3-hover-black w3-large w3-black w3-hover-text-red" href="javascript:void(0);" onclick="openNav()"><i class="fa fa-bars"></i></a>
            <a href="homepage.php" class="w3-bar-item w3-button w3-padding-large w3-black w3-hover-blue w3-text-red" style="width: 300px">PAPYRUS</a>
            <div class="w3-dropdown-hover w3-hide-small">
                <button class="w3-button w3-hide-small w3-padding-large w3-hover-blue" title="Messages"><i class="fa fa-envelope"></i><span class="w3-badge w3-right w3-small w3-red">4</span></button>
                <div class="w3-dropdown-content w3-card-4 w3-bar-block" style="width:300px;">
                    <a href="Message.html" class="w3-small w3-bar-item w3-button w3-text-blue w3-right-align w3-hover-none w3-text-black w3-hover-text-red">Read All Messages</a>
                    <a href="#" class="w3-bar-item w3-button w3-hover-red"><p class="w3-text-black w3-small"><b>Chowdhury Rabith Amin</b></p><p class="w3-right w3-small w3-text-black">Ki obostha programmer?</p></a>
                    <a href="#" class="w3-bar-item w3-button w3-hover-red"><p class="w3-text-black w3-small"><b>Abrar Baruque Aurko</b></p><p class="w3-right w3-small w3-text-black">ek dine tor hoibo re shoron o hason raja</p></a>
                    <a href="#" class="w3-bar-item w3-button w3-hover-red"><p class="w3-text-black w3-small"><b>Muktadir Rabbi Shotej</b></p><p class="w3-right w3-small w3-text-black">Raja Raja Raja, Dil mein kar aja</p></a>
                    <a href="#" class="w3-bar-item w3-button w3-hover-red"><p class="w3-text-black w3-small"><b>Tasin Shafi Leon</b></p><p class="w3-right w3-small w3-text-black">Bhhagke, dun dun dun dun dun dun dun</p></a>
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
                    <a href="account.php" class="w3-bar-item w3-button w3-hover-red"><?php echo $first_name.' '.$last_name; ?></a>
                    <a href="#" class="w3-bar-item w3-button w3-hover-red">Account Settings</a>
                    <a href="logout.php" class="w3-bar-item w3-button w3-hover-red">Logout</a>
                </div>
            </div>
        </div>
    </div>

    <!-- Navbar on small screens -->
    <div id="navDemo" class="w3-bar-block w3-black w3-text-white w3-hide w3-hide-large w3-hide-medium w3-large" style="margin-top: 51px">
        <a href="#" class="w3-bar-item w3-button w3-padding-large">Link 1</a>
        <a href="#" class="w3-bar-item w3-button w3-padding-large">Link 2</a>
        <a href="library.php" class="w3-bar-item w3-button w3-padding-large">Library</a>
        <a href="account.php" class="w3-bar-item w3-button w3-padding-large w3-right">Profile</a>
        <a href="#" class="w3-bar-item w3-button w3-padding-large w3-right">Account Settings</a>
        <a href="logout.php" class="w3-bar-item w3-button w3-padding-large w3-right">Logout</a>
    </div>

    <!-- Page Container -->
    <div class="w3-container w3-content" style="max-width:100%;margin-top:80px">    
        <!-- The Grid -->
  	<div class="w3-row">
    
            <!-- Left column -->
            <div class="w3-twothird">
    
      		<div class="w3-row-padding">
                    <div class="w3-col m12">
          		<div class="w3-card w3-round w3-white" id="user_post">
                            <div class="w3-container w3-padding">
              			<h6 class="w3-opacity">What are you thinking?</h6>
                                <form action="homepage.php" autocomplete="off" method="POST">
                                    <div class="field-wrap">
                                        <input type="text" required autocomplete="off" placeholder="write here" style=" color: black" name="postContent"/>
                                        <button type="submit" class="w3-button w3-theme w3-hover-blue" style="margin-top: 20px" name="post_button"><i class="fa fa-pencil"></i>  Post</button>
                                    </div>
                                </form>
                            </div>
          		</div>
                    </div>
      		</div>
                
                <?php while ($post = $result2->fetch_assoc()): ?> 
      		<div class="w3-container w3-card w3-white w3-round w3-margin"><br>
                    <img src="img/avatar.jpg" alt="Avatar" class="w3-left w3-circle w3-margin-right" style="height: 60px; width: 60px">
                    <span class="w3-right w3-opacity"><?= $post['time']?></span>
                    <h4><?= $post['name']?></h4><br>
                    <hr class="w3-clear">
                    <p><?= $post['content']?></p>
                    <button type="button" class="w3-button w3-theme w3-hover-blue w3-margin-bottom"><i class="fa fa-thumbs-up"></i>  Like</button> 
                    <button type="button" class="w3-button w3-theme w3-hover-blue w3-margin-bottom"><i class="fa fa-comment"></i>  Comment</button>
      		</div><?php endwhile;?>

            </div>      
            <!-- End Left Column -->
            
            <!-- Right Column -->
            <div class="w3-third">
                <!-- Top header -->
                <header class="w3-container w3-xlarge">
                    <a href="library.php" class="w3-left w3-text-black w3-hover-text-red">Library</a>
                    <a href="library.php" class="w3-right w3-text-black w3-hover-text-red"><i class="fa fa-search w3-margin-right"></i></a>
                    <a href="#" class="w3-right w3-text-black w3-hover-text-red"><i class="fa fa-shopping-cart w3-margin-right"></i></a>
  		</header>

                <!-- Image header -->
  		<div class="w3-display-container w3-container">
                    <img src="img/book-ad.gif" alt="Books" style="width:100%">
                        <div class="w3-display-topleft w3-text-white" style="padding:0 30px">
                            <h3 class="w3-left-align w3-hide-small">New arrivals</h3>
                            <h1 class="w3-text-white w3-left-align w3-hide-small">BEST BOOK</h1>
                            <p><a href="library.php" class="w3-button w3-red w3-hover-blue">SHOP NOW</a></p>
                        </div>
  		</div>

                <div class="w3-container w3-text-black" id="Books">
                    <p><h4>8 Books</h4></p>
  		</div>

                <!-- Product grid -->
                <div class="w3-row w3-grayscale" style=" text-align: center ">
                    <?php while ($book = $result->fetch_assoc()): ?> 
                    <div>
                        <div class="w3-container">
                            <a href="<?= $book['pdf']?>" style="color: black" class="w3-hover-shadow w3-hover-opacity w3-hover-text-red">
                            <img src="<?= $book['image']?>" style=" height: 239.4px; width: 180px">
                            <p><?= $book['book_name']?><br><b>৳<?= $book['price']?></b></p>
                            </a>
                        </div>
                    </div><?php endwhile;?>
                </div>
                <!-- End Product Grid -->
            </div>
            <!-- End Right Column -->
        </div>
  	<!-- End Grid -->
    </div><br>
    <!-- End Page Container -->


<footer class="w3-container w3-theme-d5">
  <p>Powered by <a href="homepage.html" target="_blank" class="w3-hover-text-red w3-text-blue">Papyrus</a></p>
</footer>
 
<script>
// Accordion
function myFunction(id) {
    var x = document.getElementById(id);
    if (x.className.indexOf("w3-show") == -1) {
        x.className += " w3-show";
        x.previousElementSibling.className += " w3-theme-d1";
    } else { 
        x.className = x.className.replace("w3-show", "");
        x.previousElementSibling.className = 
        x.previousElementSibling.className.replace(" w3-theme-d1", "");
    }
}

// Used to toggle the menu on smaller screens when clicking on the menu button
function openNav() {
    var x = document.getElementById("navDemo");
    if (x.className.indexOf("w3-show") == -1) {
        x.className += " w3-show";
    } else { 
        x.className = x.className.replace(" w3-show", "");
    }
}
</script>

</body>
</html> 
