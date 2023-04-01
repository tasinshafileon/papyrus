<?php
require 'db.php';
/* Displays user information and some useful messages */
session_start();


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
//call query method of $mysqli object
$result = $mysqli->query 
        //SELECT queries are always return as mysqli result objects
        ("SELECT * FROM user_book WHERE email='$email'") 
        or die($mysqli->error); 
?>
<!DOCTYPE html>
<html>
<title>Papyrus | Profile</title>

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
    
<!-- Sidebar/menu -->
    <nav class="w3-sidebar w3-collapse w3-white w3-animate-left" style="z-index:3;width:300px; margin-top:0 " id="mySidebar"><br>
        <div class="w3-container">
            <a href="#" onclick="w3_close()" class="w3-hide-large w3-right w3-jumbo w3-padding w3-hover-grey" title="close menu">
                <i class="fa fa-remove"></i>
            </a>
            <img src="img/avatar.jpg" style="width:45%;" class="w3-round"><br><br>
            <h4><b><?php echo $first_name.' '.$last_name; ?></b></h4>
            <a href="homepage.php"><p class="w3-text-grey w3-hover-text-red">Papyrus.com</p></a>
        </div>
        <div class="w3-bar-block">
            <a href="account.php" onclick="w3_close()" class="w3-bar-item w3-button w3-padding w3-hover-red"><i class="fa fa-th-large fa-fw w3-margin-right"></i>PROFILE</a> 
            <a href="#about" onclick="w3_close()" class="w3-bar-item w3-button w3-padding w3-hover-red"><i class="fa fa-user fa-fw w3-margin-right"></i>ABOUT</a> 
            <a href="#bir" onclick="w3_close()" class="w3-bar-item w3-button w3-padding w3-hover-red"><i class="fa fa-book fa-fw w3-margin-right"></i>MY BOOKS</a> 
            <a href="#contact" onclick="w3_close()" class="w3-bar-item w3-button w3-padding w3-hover-red"><i class="fa fa-envelope fa-fw w3-margin-right"></i>CONTACT</a>
        </div>
        <div class="w3-panel w3-large">
            <i class="fa fa-facebook-official w3-hover-opacity" style="color: #3b5998"></i>
            <i class="fa fa-instagram w3-hover-opacity" style="color: #e95950"></i>
            <i class="fa fa-twitter w3-hover-opacity" style="color: #55acee"></i>
            <i class="fa fa-snapchat w3-hover-opacity" style="color: #fffc00 "></i>
            <i class="fa fa-linkedin w3-hover-opacity" style="color: #007bb5"></i>
            <i class="fa fa-pinterest-p w3-hover-opacity" style="color: #cb2027"></i>
        </div>
    </nav>

<!-- Overlay effect when opening sidebar on small screens -->
    <div class="w3-overlay w3-hide-large w3-animate-opacity" onclick="w3_close()" style="cursor:pointer" title="close side menu" id="myOverlay">
    
    </div>

<!-- !PAGE CONTENT! -->
    <div class="w3-main" style="margin-left:300px; margin-top: 52px">

  <!-- Header -->
        <header>
            <span class="w3-button w3-hide-large w3-xxlarge w3-hover-text-red" onclick="w3_open()"><i class="fa fa-bars"></i></span>
            <div class="w3-container">
                <h1><b class="w3-text-black" style=" font-size: 32px"><?php echo $first_name.' '.$last_name; ?>'s Profile</b></h1>
                <div class="w3-section w3-bottombar w3-padding-16">
                    <span class="w3-margin-right">Filter:</span> 
                    <button class="w3-button w3-hover-blue w3-black">ALL</button>
                    <button class="w3-button w3 w3-hover-blue w3-red"><i class="fa fa-bars w3-margin-right"></i>Posts</button>
                    <button class="w3-button w3-red w3-hover-blue w3-hide-small"><i class="fa fa-book w3-margin-right"></i>My Books</button>
                    <button class="w3-button w3-hover-blue w3-red w3-hide-small"><i class="fa fa-star w3-margin-right"></i>Wishlist</button>
                </div>
            </div>
        </header>
  
  <!-- First Photo Grid-->
        <div class="w3-row-padding">
            <div class="w3-third w3-container w3-margin-bottom">
                <img src="/w3images/mountains.jpg" alt="Norway" style="width:100%" class="w3-hover-opacity">
                <div class="w3-container w3-white">
                    <p><b>Lorem Ipsum</b></p>
                    <p>Praesent tincidunt sed tellus ut rutrum. Sed vitae justo condimentum, porta lectus vitae, ultricies congue gravida diam non fringilla.</p>
                </div>
            </div>
            <div class="w3-third w3-container w3-margin-bottom">
                <img src="logo2-01.png" alt="Norway" style="width:100%" class="w3-hover-opacity">
                <div class="w3-container w3-white">
                    <p><b>Lorem Ipsum</b></p>
                    <p>Praesent tincidunt sed tellus ut rutrum. Sed vitae justo condimentum, porta lectus vitae, ultricies congue gravida diam non fringilla.</p>
                </div>
            </div>
            <div class="w3-third w3-container">
                <img src="/w3images/nature.jpg" alt="Norway" style="width:100%" class="w3-hover-opacity">
                <div class="w3-container w3-white">
                    <p><b>Lorem Ipsum</b></p>
                    <p>Praesent tincidunt sed tellus ut rutrum. Sed vitae justo condimentum, porta lectus vitae, ultricies congue gravida diam non fringilla.</p>
                </div>
            </div>
        </div>
  
  <!-- Second Photo Grid-->
        <div class="w3-row-padding">
            <div class="w3-third w3-container w3-margin-bottom">
                <img src="/w3images/p1.jpg" alt="Norway" style="width:100%" class="w3-hover-opacity">
                <div class="w3-container w3-white">
                    <p><b>Lorem Ipsum</b></p>
                    <p>Praesent tincidunt sed tellus ut rutrum. Sed vitae justo condimentum, porta lectus vitae, ultricies congue gravida diam non fringilla.</p>
                </div>
            </div>
            <div class="w3-third w3-container w3-margin-bottom">
                <img src="/w3images/p2.jpg" alt="Norway" style="width:100%" class="w3-hover-opacity">
                <div class="w3-container w3-white">
                    <p><b>Lorem Ipsum</b></p>
                    <p>Praesent tincidunt sed tellus ut rutrum. Sed vitae justo condimentum, porta lectus vitae, ultricies congue gravida diam non fringilla.</p>
                </div>
            </div>
            <div class="w3-third w3-container">
                <img src="/w3images/p3.jpg" alt="Norway" style="width:100%" class="w3-hover-opacity">
                <div class="w3-container w3-white">
                    <p><b>Lorem Ipsum</b></p>
                    <p>Praesent tincidunt sed tellus ut rutrum. Sed vitae justo condimentum, porta lectus vitae, ultricies congue gravida diam non fringilla.</p>
                </div>
            </div>
        </div>

  <!-- Pagination -->
        <div class="w3-center w3-padding-32">
            <div class="w3-bar">
                <a href="#" class="w3-bar-item w3-button w3-hover-black">«</a>
                <a href="#" class="w3-bar-item w3-button w3-hover-black">1</a>
                <a href="#" class="w3-bar-item w3-button w3-hover-black">2</a>
                <a href="#" class="w3-bar-item w3-button w3-hover-black">3</a>
                <a href="#" class="w3-bar-item w3-button w3-hover-black">4</a>
                <a href="#" class="w3-bar-item w3-button w3-hover-black">»</a>
            </div>
        </div>

  <!-- Images of Me -->
        <div class="w3-row-padding w3-padding-16" id="about">
            <div class="w3-col m6">
                <img src="23172694_1829551020405906_7323851058328385770_n.jpg" alt="Me" style="width:100%; margin-top: 34px">
            </div>
            <div class="w3-col m6">
                <img src="23172694_1829551020405906_7323851058328385770_n.jpg" alt="Me" style="width:100%; margin-top: 34px">
            </div>
        </div>

        <div class="w3-container w3-padding-large" style="margin-bottom:32px">
            <h4><b>About Me</b></h4>
            <p>Just me, myself and I, exploring the universe of unknownment. I have a heart of love and an interest of lorem ipsum and mauris neque quam blog. I want to share my world with you. Praesent tincidunt sed tellus ut rutrum. Sed vitae justo condimentum, porta lectus vitae, ultricies congue gravida diam non fringilla. Praesent tincidunt sed tellus ut rutrum. Sed vitae justo condimentum, porta lectus vitae, ultricies congue gravida diam non fringilla.</p>
        </div>    
        <hr id="bir" style="margin-bottom: 51px">
    
        <h4 style=" text-align: center">Books I Read</h4>
        <div class="w3-container w3-text-grey" id="jeans">
            <p>8 items</p>
        </div>
<!-- Start Books I read -->
        <div class="w3-row w3-grayscale">
            <div class="w3-col l3 s6">
                <div class="w3-container">
                    <img src="Header_Image2.jpg" style="width:100%">
                    <p>Ripped Skinny Jeans<br></p>
                </div>
                <div class="w3-container">
                    <img src="Header_Image2.jpg" style="width:100%">
                    <p>Mega Ripped Jeans<br></p>
                </div>
            </div>
            <div class="w3-col l3 s6">
                <div class="w3-container">
                    <img src="Header_Image2.jpg" style="width:100%">
                    <p>Mega Ripped Jeans<br></p>
                </div>
                <div class="w3-container">
                    <img src="Header_Image2.jpg" style="width:100%">
                    <p>Washed Skinny Jeans<br></p>
                </div>
            </div>

            <div class="w3-col l3 s6">
                <div class="w3-container">
                    <img src="Header_Image2.jpg" style="width:100%">
                    <p>Washed Skinny Jeans<br></p>
                </div>
                <div class="w3-container">
                    <div class="w3-display-container">
                        <img src="Header_Image2.jpg" style="width:100%">
                    </div>
                    <p>Vintage Skinny Jeans<br>   
                </div>
            </div>

            <div class="w3-col l3 s6">
                <div class="w3-container">
                    <img src="Header_Image2.jpg" style="width:100%">
                    <p>Vintage Skinny Jeans<br></p>
                </div>
                <div class="w3-container">
                    <img src="Header_Image2.jpg" style="width:100%">
                    <p>Ripped Skinny Jeans<br></p>
                </div>
            </div>
        </div>
        <hr id="contact">
    
   
  <!-- Contact Section -->
        <div class="w3-container w3-padding-large w3-black">
            <h4><b>Contact Us</b></h4>
            <div class="w3-row-padding  w3-center w3-padding-24" style="margin:0 -10px">
                <div class="w3-third  w3-red">
                    <p><i class="fa fa-envelope w3-xlarge w3-text-light-grey"></i></p>
                    <p>PapyrusHelpLine@Papyrus.com</p>
                </div>
                <div class="w3-third w3-white">
                    <p><i class="fa fa-map-marker w3-xlarge w3-text-red"></i></p>
                    <p>Dhaka, Bangladesh</p>
                </div>
                <div class="w3-third w3-red">
                    <p><i class="fa fa-phone w3-xlarge w3-text-light-grey w3-"></i></p>
                    <p>+880 911</p>
                </div>
            </div>
            <hr class="w3-opacity">
            <form action="/action_page.php" target="_blank">
                <div class="w3-section">
                    <label>Name</label>
                    <input class="w3-input w3-border" type="text" name="Name" required>
                </div>
                <div class="w3-section">
                    <label>Email</label>
                    <input class="w3-input w3-border" type="text" name="Email" required>
                </div>
                <div class="w3-section">
                    <label>Message</label>
                    <input class="w3-input w3-border" type="text" name="Message" required>
                </div>
                <button type="submit" class="w3-button w3-black w3-margin-bottom"><i class="fa fa-paper-plane w3-margin-right"></i>Send Message</button>
            </form>
        </div>
    </div>


  <!-- Footer -->
    <footer class="w3-container w3-padding-32 w3-dark-grey">
        <div class="w3-row-padding">
            <div class="w3-third">
                <h3>Contact Us</h3>
                <p><a href="PapyrusHelpLine@Papyrus.com" class="w3-hover-text-red w3-text-blue" >Email Us</a></p>
                <p>Powered by <a href="homepage.php" class="w3-hover-text-red w3-text-blue" target="_blank">Papyrus</a></p>
            </div>
  
            <div class="w3-third">
                <h3>BLOG POSTS</h3>
                    <ul class="w3-ul w3-hoverable">
                        <li class="w3-padding-16">
                            <img src="/w3images/workshop.jpg" class="w3-left w3-margin-right" style="width:50px">
                            <span class="w3-large">Lorem</span><br>
                            <span>Sed mattis nunc</span>
                        </li>
                        <li class="w3-padding-16">
                            <img src="/w3images/gondol.jpg" class="w3-left w3-margin-right" style="width:50px">
                            <span class="w3-large">Ipsum</span><br>
                            <span>Praes tinci sed</span>
                        </li> 
                    </ul>
            </div>

            <div class="w3-third">
                <h3>POPULAR TAGS</h3>
                <p>
                    <span class="w3-tag w3-black w3-margin-bottom">Sci-Fi</span> <span class="w3-tag w3-grey w3-small w3-margin-bottom">Origin</span> <span class="w3-tag w3-grey w3-small w3-margin-bottom">Harry Potter</span>
                    <span class="w3-tag w3-grey w3-small w3-margin-bottom">Horror</span> <span class="w3-tag w3-grey w3-small w3-margin-bottom">Fiction</span> <span class="w3-tag w3-grey w3-small w3-margin-bottom">Syndrom-E</span>
                    <span class="w3-tag w3-grey w3-small w3-margin-bottom">Drama</span> <span class="w3-tag w3-grey w3-small w3-margin-bottom">Baby</span> <span class="w3-tag w3-grey w3-small w3-margin-bottom">Family</span>
                    <span class="w3-tag w3-grey w3-small w3-margin-bottom">The Red Pyramid</span> <span class="w3-tag w3-grey w3-small w3-margin-bottom">Science</span> <span class="w3-tag w3-grey w3-small w3-margin-bottom">Religion</span>
                    <span class="w3-tag w3-grey w3-small w3-margin-bottom">Adventure</span> <span class="w3-tag w3-grey w3-small w3-margin-bottom">Games</span>
                </p>
            </div>

        </div>
    </footer>
  
 

<script>
// Script to open and close sidebar
function w3_open() {
    document.getElementById("mySidebar").style.display = "block";
    document.getElementById("myOverlay").style.display = "block";
}
 
function w3_close() {
    document.getElementById("mySidebar").style.display = "none";
    document.getElementById("myOverlay").style.display = "none";
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