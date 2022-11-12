const _form = document.querySelector(".typing-area > form"),
_msg = _form.querySelector("input"),
sendBtn = _form.querySelector("button"),
_chatBox = document.querySelector(".chat-box");

_form.onsubmit = (e) => {
    e.preventDefault();
};

sendBtn.onclick = ()=>{
    let xhr = new XMLHttpRequest();
    xhr.open("POST", "php/insert-chat.php", true);
    xhr.onload = ()=>{
        if(xhr.readyState === XMLHttpRequest.DONE){
            if(xhr.status === 200){
                _msg.value = "";
            }
        }
    };  
    let formData = new FormData(_form);
    xhr.send(formData);
};


setInterval(function(){
    let xhr = new XMLHttpRequest();
    xhr.open("POST", "php/get-chat.php", true);
    
    xhr.onload = () => {
        if(xhr.readyState === XMLHttpRequest.DONE){
            if(xhr.status === 200){
                let res = xhr.response;
                _chatBox.innerHTML = res;
            }
        }
    }

    let formData = new FormData(_form);
    xhr.send(formData);
}, 500);
