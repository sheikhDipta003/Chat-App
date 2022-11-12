<?php
session_start();
require_once "conn.php";

if($_SERVER['REQUEST_METHOD'] == "POST"){
    $_email = mysqli_escape_string($conn, $_POST['email']);
    $_pass = mysqli_escape_string($conn, $_POST['pass']);
    
    
    if(!empty($_email) && !empty($_pass)){
        $query = mysqli_query($conn, "SELECT * FROM users WHERE email = '{$_email}' and password = '{$_pass}'");
        if(mysqli_num_rows($query) > 0){
            $row = mysqli_fetch_assoc($query);
            $status = "Active now";
            $query = mysqli_query($conn, "UPDATE users SET status = '{$status}' WHERE unique_id = {$row['unique_id']}");
            if($query){
                $_SESSION['unique_id'] = $row['unique_id'];
                echo "login successful";
            }
        }
        else{
            echo "Email or password is/are incorrect";
        }
    }
    else{
        echo "All input fields are required";
    }
}
?>