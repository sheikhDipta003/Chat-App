<?php
$conn = mysqli_connect("localhost", "root", "", "chat");
if(!$conn){
    echo "Connection failed: ".mysqli_connect_error();
}
require_once 'crud.php';
$crud = new crud($conn);
?>