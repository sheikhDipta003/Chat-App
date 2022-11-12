<?php
    session_start();
    if(isset($_SESSION['unique_id'])){
        header("location : users.php");
    }
?>

<?php 
$title = "index";
$style = "index";
require_once "header.php";
?>
<body>
    <div class="main">
        <section class="row">
            <section class="col-12"><h1>Not-so-cool Chat App</h1></section>
            <form action="#" class="signup" enctype="multipart/form-data">
                <section class="col-12"><div class="error-txt"></div></section>
                <section class="col-6"><label>First Name</label></section>
                <section class="col-6"><input type="text" name="fname" required></section>
                <section class="col-6"><label>Last Name</label></section>
                <section class="col-6"><input type="text" name="lname" required></section>
                <section class="col-6"><label>Email Address</label></section>
                <section class="col-6"><input type="email" name="email" required></section>
                <section class="col-6"><label>Password</label></section>
                <section class="col-6">
                    <input type="password" class="user_pass" name="pass" required>
                    <img src="images/password_eye_open.png" alt="" width="20vw" class="pass-eye">
                </section>
                <section class="col-6"><label>Select Image</label></section>
                <section class="col-6"><input type="file" name="image" required></section>
                <section class="col-12">
                    <div class="cont-chat"><input type="submit" value="Continue to chat" class="cont-chat-btn"></div>
                </section>
                <section class="col-12">Already signed up? <a href="login.php">Login</a></section>
            </form>
        </section>
    </div>

    <script src="js/pass_show_hide.js"></script>
    <script src="js/signup.js"></script>
</body>
</html>