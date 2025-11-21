<?php
require 'db.php'; // connect to database

// calculate 10% profit for all users
$result = $conn->query("SELECT id, balance FROM users");
while($row = $result->fetch_assoc()){
    $new_balance = $row['balance'] * 1.10;
    $conn->query("UPDATE users SET balance=$new_balance WHERE id=".$row['id']);
}
$conn->close();
?>