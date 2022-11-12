<?php
session_start();
$_out_id = $_SESSION['unique_id'];
require_once "conn.php";
$query = mysqli_query($conn, "SELECT * FROM users WHERE NOT unique_id = {$_out_id}");
$result = "";

if(mysqli_num_rows($query) == 1){   //the person signed-in/logged-in is not counted
    $result .= "No users are available";
}
else if(mysqli_num_rows($query) > 0){
    include_once "thumbnail_users.php";
}
else{
    $result .= "Error loading users-list";
}

echo $result;
?>