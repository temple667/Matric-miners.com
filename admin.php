<?php
session_start();
if(!isset($_SESSION['admin'])){
    header("Location: ../login.html");
    exit();
}
require 'db.php';

if(isset($_GET['action']) && isset($_GET['id'])){
    $id = intval($_GET['id']);
    if($_GET['action'] == 'reset'){
        $conn->query("UPDATE users SET balance=0 WHERE id=$id");
    } elseif($_GET['action'] == 'delete'){
        $conn->query("DELETE FROM users WHERE id=$id");
        $conn->query("DELETE FROM transactions WHERE user_id=$id");
    }
}
header("Location: ../admin.html");
exit();
?>