<?php
session_start();
require_once "conn.php";
$_searchTerm = mysqli_escape_string($conn, $_POST['searchTerm']);
$result = "";
$_out_id = $_SESSION['unique_id'];

$query = mysqli_query($conn, "SELECT * FROM users WHERE NOT unique_id = {$_out_id} AND (fname LIKE '%{$_searchTerm}%' OR lname LIKE '%{$_searchTerm}%')");

if(mysqli_num_rows($query) > 0){
    include_once "thumbnail_users.php";
}
else{
    $result .= "No users found with this name";
}

echo $result;
?>