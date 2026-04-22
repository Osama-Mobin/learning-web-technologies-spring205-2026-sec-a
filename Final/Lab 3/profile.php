<?php
session_start();
$user = $_SESSION['user'];
?>

<h2>Profile</h2>

Name: <?php echo $user['name']; ?><br>
Email: <?php echo $user['email']; ?><br>