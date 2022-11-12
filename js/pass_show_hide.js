const user_pass = document.querySelector("input[type='password']");
let toggleImg = document.querySelector(".pass-eye");
toggleImg.onclick = () => {
    if(user_pass.type === "password"){
        user_pass.type = "text";
        toggleImg.setAttribute("src", "images/password_eye_closed.png");
    }
    else{
        user_pass.type = "password";
        toggleImg.setAttribute("src", "images/password_eye_open.png");
    }
};