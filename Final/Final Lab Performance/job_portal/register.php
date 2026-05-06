<?php
include "db.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $name = $_POST['name'];
    $company = $_POST['company'];
    $contact = $_POST['contact'];
    $username = $_POST['username'];
    $password = $_POST['password'];

    if (empty($name) || empty($company) || empty($contact) || empty($username) || empty($password)) {
        echo "All fields required!";
        exit();
    }

    // 🔴 Check duplicate username
    $check = "SELECT * FROM employers WHERE username='$username'";
    $result = $conn->query($check);

    if ($result->num_rows > 0) {
        echo "Username already exists!";
        exit();
    }

    $pass = password_hash($password, PASSWORD_DEFAULT);

    $sql = "INSERT INTO employers (employer_name, company_name, contact_no, username, password)
            VALUES ('$name','$company','$contact','$username','$pass')";

    if ($conn->query($sql)) {
        echo "Registered Successfully!";
    }
}
?>