<?php

require 'db.php';

$email = $_SESSION['email'];

$result = $mysqli->query("SELECT * FROM users WHERE email='$email'") or die($mysqli->error());

$user =$result->fetch_assoc();
$id = $user['id'];
$user_post =  $_POST['postContent'];

if ( $result->num_rows == 0 ) {
    
    $_SESSION['message'] = 'User with this email doesn\'t exists!';
    header("location: error.php");
    
}
else {
    
    $result2 = $mysqli->query("INSERT INTO post (user_id, user_email, content, time) VALUES ($id,'$email','$user_post',CURRENT_TIMESTAMP)");
    header("location: homepage.php");
}
?>