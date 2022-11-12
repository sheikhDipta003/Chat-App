let _usersList = document.querySelector(".usersList"),
_searchBar = document.querySelector("input[name='searchBar']");

_searchBar.onkeyup = () => {
    let searchTerm = _searchBar.value;

    //to prevent this ajax process from clashing with the following one
    if(searchTerm != ""){ _searchBar.classList.add("active"); }
    else    _searchBar.classList.remove("active");

    let xhr = new XMLHttpRequest();
    xhr.open("POST", "php/search.php", true);
    
    xhr.onload = () => {
        if(xhr.readyState === XMLHttpRequest.DONE){
            if(xhr.status === 200){
                let res = xhr.response;
                _usersList.innerHTML = res;
            }
        }
    }

    xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    xhr.send("searchTerm=" + searchTerm);
};

setInterval(function(){
    let xhr = new XMLHttpRequest();
    xhr.open("GET", "php/users.php", true);
    
    xhr.onload = () => {
        if(xhr.readyState === XMLHttpRequest.DONE){
            if(xhr.status === 200){
                let res = xhr.response;
                if(!_searchBar.classList.contains("active")){ _usersList.innerHTML = res; }
            }
        }
    }

    xhr.send();
}, 500);