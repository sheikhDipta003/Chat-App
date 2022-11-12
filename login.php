<?php 
$title = "login";
$style = "index";
require_once "header.php";
?>
<body>
    <div class="main">
        <section class="row">
            <section class="col-12"><h1>Not-so-cool Chat App</h1></section>
            <form action="#" class="login" enctype="multipart/form-data">
                <section class="col-12"><div class="error-txt"></div></section>
                <section class="col-6"><label>Email Address</label></section>
                <section class="col-6"><input type="email" name="email"></section>
                <section class="col-6"><label>Password</label></section>
                <section class="col-6">
                    <input type="password" name="pass">
                    <img src="images/password_eye_open.png" alt="" width="20vw" class="pass-eye">
                </section>
                <section class="col-12">
                    <div class="cont-chat"><input type="submit" value="Continue to chat" class="cont-chat-btn"></div>
                </section>
                <section class="col-12">Not signed up yet? <a href="index.php">Sign-up now</a></section>
            </form>
        </section>
    </div>

    <script src="js/pass_show_hide.js"></script>
    <script src="js/login.js"></script>
</body>
</html>