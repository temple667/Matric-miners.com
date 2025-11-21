<?php
session_start();
require 'db.php';

if(!isset($_SESSION['user_id'])){
    header("Location: ../login.html");
    exit();
}

if($_SERVER['REQUEST_METHOD'] == 'POST'){
    $user_id = $_SESSION['user_id'];
    $amount = floatval($_POST['amount']);

    if($amount <= 0){
        echo "Invalid amount. <a href='../dashboard.html'>Go Back</a>";
        exit();
    }

    // Update balance
    $conn->query("UPDATE users SET balance = balance + $amount WHERE id=$user_id");

    // Record transaction
    $conn->query("INSERT INTO transactions (user_id,type,amount) VALUES ($user_id,'deposit',$amount)");

    header("Location: ../dashboard.html");
    exit();
}
?>