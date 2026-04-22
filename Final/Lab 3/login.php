<?php
session_start();

if(isset($_POST['login'])){
    if($_POST['email'] == $_SESSION['user']['email'] &&
       $_POST['password'] == $_SESSION['user']['password']){

        $_SESSION['logged_in'] = true;
        header("Location: dashboard.php");
    }
    else{
        echo "Wrong Email or Password";
    }
}
?>

<form method="post">
Email: <input type="email" name="email"><br>
Password: <input type="password" name="password"><br>
<input type="submit" name="login">
</form>