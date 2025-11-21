<?php
session_start();
require 'db.php';

if($_SERVER['REQUEST_METHOD'] == 'POST'){
    $email = $conn->real_escape_string($_POST['email']);
    $password = $_POST['password'];

    // Admin login
    if($email == "admin@matricminers.com" && $password == "admin123"){
        $_SESSION['admin'] = true;
        header("Location: ../admin.html");
        exit();
    }

    $result = $conn->query("SELECT * FROM users WHERE email='$email'");
    if($result->num_rows == 1){
        $user = $result->fetch_assoc();
        if(password_verify($password, $user['password'])){
            $_SESSION['user_id'] = $user['id'];
            header("Location: ../dashboard.html");
            exit();
        } else {
            echo "Incorrect password. <a href='../login.html'>Go Back</a>";
            exit();
        }
    } else {
        echo "Email not found. <a href='../signup.html'>Sign Up</a>";
        exit();
    }
}
?>