<?php 
while($row = mysqli_fetch_assoc($query)){
    $sql2 = "SELECT * FROM messages WHERE (incoming_msg_id = {$row['unique_id']} OR outgoing_msg_id = {$row['unique_id']}) AND 
            (incoming_msg_id = {$_out_id} OR outgoing_msg_id = {$_out_id}) ORDER BY msg_id DESC LIMIT 1";
    $query2 = mysqli_query($conn, $sql2);
    $row2 = mysqli_fetch_assoc($query2);
    if(mysqli_num_rows($query2) > 0){
        $result2 = $row2['msg'];
    }
    else{
        $result2 = "No message available";
    }

    //if the message has more than 28 bytes, trim the rest of the string and add '...'
    (strlen($result2) > 28) ? $last_msg = substr($result2, 0, 28).'...' : $last_msg = $result2;
    //adding 'You' before the last message if the sender is the logged-in person
    ($_out_id == $row2['outgoing_msg_id']) ? $you = "You: " : $you = "";
    //change color of the status dot
    ($row['status'] === "Offline now") ? $offline = "offline": $offline = "";

    $result .= '<hr>
                <a href="chat.php?user_id='.$row['unique_id'].'">
                <section class="col-12">
                    <img src="images/'.$row['img'].'" alt="" width="10%" class="profile_pic">
                    <span>'.$row['fname']." ".$row['lname'].'</span>
                    <p>'. $you . $last_msg .'</p>
                    <div class="status-dot '.$offline.'"></div>
                </section>
                </a>';

};
?>