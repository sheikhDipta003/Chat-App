<?php
session_start();

if(isset($_SESSION['unique_id'])){
    require_once "conn.php";
    $_out_id = mysqli_escape_string($conn, $_POST['outgoing_id']);
    $_in_id = mysqli_escape_string($conn, $_POST['incoming_id']);
    $result = "";

    $sql = "SELECT * FROM messages WHERE (incoming_msg_id = {$_in_id} AND outgoing_msg_id = {$_out_id}) OR 
            (incoming_msg_id = {$_out_id} AND outgoing_msg_id = {$_in_id}) ORDER BY msg_id DESC";
    $query = mysqli_query($conn, $sql);

    if(mysqli_num_rows($query) > 0){
        while($row = mysqli_fetch_assoc($query)){
            if($row['outgoing_msg_id'] = $_out_id){
                $result .= '<section class="col-12">
                                <div class="chat-outgoing">
                                    <p>'.$row['msg'].'</p>
                                </div>
                            </section>';
            }
            else if($row['incoming_msg_id'] = $_in_id){
                $query2 = mysqli_query($conn, "SELECT img FROM users WHERE unique_id = {$_in_id}");
                $row2 = mysqli_fetch_assoc($query2);
                $result .= '<section class="col-12">
                                <img src="images/'.$row2['img'].'" alt="" class="profile_pic">
                                <div class="chat-incoming">
                                    <p>'.$row['msg'].'</p>
                                </div>
                            </section>';
            }
        }
    }

    echo $result;
}
else{
    header("location: login.php");
}
?>