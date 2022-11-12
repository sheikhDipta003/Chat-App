<?php 
session_start();
require_once "php/conn.php";
if(!isset($_SESSION['unique_id'])){     //to prevent users who aren't logged in/signed in from reaching the chat page
    header("location: login.php");
}
else{
    $rows = "";
    $query = mysqli_query($conn, "SELECT * FROM users WHERE unique_id = {$_SESSION['unique_id']}");
    if(mysqli_num_rows($query) > 0){
        $row = mysqli_fetch_assoc($query);
    }
}
?>

<?php 
$title = "users";
$style = "users";
require_once "header.php";
?>

<body>
    <div class="main">
        <section class="row">
            <section class="col-12">
                <img src="images/<?php echo $row['img'];?>" alt="" width="10%" class="profile_pic">
                <span><?php echo $row["fname"]." ".$row["lname"];?></span>
                <p><?php echo $row["status"];?></p>
                <a href="php/logout.php?user_id=<?php echo $_SESSION['unique_id']; ?>" class="logout">Logout</a>
            </section>

            <hr>

            <div>
                <section class="col-11">
                    <input type="text" placeholder="Enter name to search..." name="searchBar">
                </section>
                <section class="col-1">
                    <img src="images/search_icon.png" alt="" class="search_icon">
                </section>
            </div>

            <div class="usersList"></div>

        </section>
    </div>

    <script src="js/users.js"></script>
</body>
</html>