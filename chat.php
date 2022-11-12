<?php 
session_start();
require_once "php/conn.php";

if(!isset($_SESSION['unique_id'])){     //to prevent users who aren't logged-in/signed-in from reaching the chat page
    header("location: login.php");
}
else{
    $rows = "";
    $_user_id = mysqli_escape_string($conn, $_GET['user_id']);
    $query = mysqli_query($conn, "SELECT * FROM users WHERE unique_id = '{$_user_id}'");
    if(mysqli_num_rows($query) > 0){
        $row = mysqli_fetch_assoc($query);
    }
}
?>

<?php 
$title = "chat";
$style = "chat";
require_once "header.php";
?>

<body>
    <main>
        <section class="row">
            <section class="col-12 chat-area">
                <header>
                    <a href="users.php"><img src="images/left_arrow.png" alt="" width="20vw" class="back-icon"></a>
                    <img src="images/<?php echo $row['img'];?>" alt="" class="profile_pic">
                    <img src="#" alt="">
                    <div class="details">
                        <span><?php echo $row["fname"]." ".$row["lname"];?></span>
                        <p><?php echo $row["status"];?></p>
                    </div>
                </header>
            </section>

            <section class="chat-box"></section>

            <section class="col-12" class="typing-area">
                <form action="#" enctype="multipart/form-data">
                    <input type="text" name="outgoing_id" value="<?php echo $_SESSION['unique_id'];?>" hidden>     <!--sending sender id-->
                    <input type="text" name="incoming_id" value="<?php echo $_user_id;?>" hidden>  <!--sending receiver id-->
                    <input type="text" name="messsage" placeholder="Type a message here...">
                    <button>
                        <span>></span>
                    </button>
                </form>
            </section>

        </section>
    </main>

    <script src="js/chat.js"></script>
</body>
</html>