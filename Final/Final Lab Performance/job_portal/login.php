<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);
session_start();
include "db.php";
?>




<?php
session_start();
include "db.php";
?>

<h2>Login</h2>

<form method="POST">
    Username: <input type="text" name="username"><br>
    Password: <input type="password" name="password"><br>
    <button type="submit">Login</button>
</form>

<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $username = $_POST['username'];
    $password = $_POST['password'];

    if (empty($username) || empty($password)) {
        echo "Fill all fields!";
        exit();
    }

    $sql = "SELECT * FROM employers WHERE username='$username'";
    $result = $conn->query($sql);

    if ($row = $result->fetch_assoc()) {

        if (password_verify($password, $row['password'])) {
            $_SESSION['user'] = $username;
            header("Location: dashboard.php");
        } else {
            echo "Wrong password!";
        }

    } else {
        echo "User not found!";
    }
}
?>