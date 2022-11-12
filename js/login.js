const _form = document.querySelector(".login");
const continueBtn = document.querySelector(".cont-chat-btn");
let _errorTxt = document.querySelector(".error-txt");

_form.onsubmit = (e) => {
    e.preventDefault();
};

continueBtn.onclick = ()=>{
    let xhr = new XMLHttpRequest();
    xhr.open("POST", "php/login.php", true);
    
    xhr.onload = () => {
        if(xhr.readyState === XMLHttpRequest.DONE){
            if(xhr.status === 200){
                let res = xhr.response;
                console.log(res);
                if(res == "login successful"){
                    location.href = "users.php";
                }
                else{
                    _errorTxt.textContent = res;
                    _errorTxt.style.display = "block";
                }
            }
        }
    }

    let formData = new FormData(_form);
    xhr.send(formData);
};

