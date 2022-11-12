<?php
session_start();

if($_SERVER['REQUEST_METHOD'] === "POST" && isset($_SESSION['unique_id'])){
    require_once "conn.php";
    $_out_id = mysqli_escape_string($conn, $_POST['outgoing_id']);
    $_in_id = mysqli_escape_string($conn, $_POST['incoming_id']);
    $_msg = mysqli_escape_string($conn, $_POST['message']);
    
    // $query = mysqli_query($conn, "SELECT * FROM users WHERE fname LIKE '%{$_searchTerm}%' OR lname LIKE '%{$_searchTerm}%'");
    if(!empty($_msg)){
        $query = mysqli_query($conn, "INSERT INTO messages (incoming_msg_id, outgoing_msg_id, msg) VALUES ({$_in_id}, {$_out_id}, {$_msg})");
    }
    else{
        header("location: login.php");
    }
}
?>