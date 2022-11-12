<?php
    session_start();
    require_once "conn.php";

    if($_SERVER['REQUEST_METHOD'] == "POST"){
        $_fname = mysqli_real_escape_string($conn, $_POST['fname']);
        $_lname = mysqli_real_escape_string($conn, $_POST['lname']);
        $_email = mysqli_real_escape_string($conn, $_POST['email']);
        $_pass = mysqli_real_escape_string($conn, $_POST['pass']);

        if(!empty($_fname) && !empty($_lname) && !empty($_email) && !empty($_pass)){
            //check if email is valid
            if(filter_var($_email, FILTER_VALIDATE_EMAIL)){
                $sql = mysqli_query($conn, "SELECT email FROM users WHERE email = '{$_email}'");
                if(mysqli_num_rows($sql) > 0){
                    echo $_email." - this email already exists";
                }
                else{
                    //check if image has been uploaded
                    if(isset($_FILES['image'])){
                        $img_name = $_FILES['image']['name'];   //get the name of the image
                        $tmp_name = $_FILES['image']['tmp_name'];   //this temp name is used to save/move the image to our folder

                        $img_explode = explode(".", $img_name);
                        $img_ext = end($img_explode);    //get the extension of the uploaded image

                        $extensions = ["png", "jpeg", "jpg"];
                        if(in_array($img_ext, $extensions) === true){
                            $new_img_name = time().$img_name;

                            if(move_uploaded_file($tmp_name, "C:/xampp/htdocs/chatApp/images/".$new_img_name)){
                                $status = "Active now";
                                $random_id = rand(time(), 10000000);

                                $sql2 = mysqli_query($conn, 
                                "INSERT INTO users (unique_id, fname, lname, email, password, img, status)
                                VALUES('{$random_id}', '{$_fname}', '{$_lname}', '{$_email}', '{$_pass}', '{$new_img_name}', '{$status}')");

                                if($sql2){
                                    $_SESSION['unique_id'] = $random_id;
                                    echo "signup successful";
                                }
                                else{
                                    echo "Failed to insert user data";
                                }
                            }
                        }
                        else{
                            echo "Please upload a png, jpeg or jpg file";
                        }
                    }
                }
            }
            else{
                echo $_email." is not a valid email";
            }
        }else {
            echo "All input fields are required";
        }
    }
?>