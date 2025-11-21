<?php
session_start();
require 'db.php';

if($_SERVER['REQUEST_METHOD'] == 'POST'){
    $fullname = $conn->real_escape_string($_POST['fullname']);
    $email = $conn->real_escape_string($_POST['email']);
    $password = password_hash($_POST['password'], PASSWORD_DEFAULT);

    // Check if email exists
    $check = $conn->query("SELECT * FROM users WHERE email='$email'");
    if($check->num_rows > 0){
        echo "Email already exists. <a href='../signup.html'>Go Back</a>";
        exit();
    }

    // Insert new user
    $conn->query("INSERT INTO users (fullname,email,password) VALUES ('$fullname','$email','$password')");
    $_SESSION['user_id'] = $conn->insert_id;
    header("Location: ../dashboard.html");
    exit();
}
?>