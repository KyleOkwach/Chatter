const friendsBtn = document.querySelector(".btn-friends");
const groupsBtn = document.querySelector(".btn-groups");
const contacts = document.querySelector(".contacts");
const searchBar = document.querySelector(".searchbar");


let category = "friends";
let searching = false;

friendsBtn.onclick = () => {
    category = "friends";
}
groupsBtn.onclick = () => {
    category = "groups";
}

const getParam = (parameter) => {
    let params = new URLSearchParams(window.location.search);
    // return params.get(parameter);
    return params;
}

setInterval(() => {
    if(category == "friends") {
        friendsBtn.classList.add("btn-active");
        groupsBtn.classList.remove("btn-active");
    } else if(category == "groups") {
        groupsBtn.classList.add("btn-active");
        friendsBtn.classList.remove("btn-active");
    }
}, 50);
setInterval(() => {
    let xhr = new XMLHttpRequest;

    switch(category) {
    case "friends":
        xhr.open("POST", "PHP/friend_contact.php", true);
        break;
    case "groups":
        xhr.open("POST", "PHP/group_contact.php", true);
        break;
    }

    xhr.onload = () => {
        if(xhr.readyState == xhr.DONE) {
            if(xhr.status == 200) {
                let data = xhr.response;
                if(!searching) {
                    contacts.innerHTML = data;
                }
            }
        }
    }

    // xhr.send();
    xhr.send(getParam("user"));

}, 500);

// search bar
searchBar.onkeyup = ()=>{
    let searchTerm = searchBar.value;
    if(searchTerm != ""){
        searching = true;
    }else {
        searching = false;
    }
    let xhr = new XMLHttpRequest();
    xhr.open("POST", "PHP/search.php", true);
    xhr.onload = () => {
        if(xhr.readyState === XMLHttpRequest.DONE) {
            if(xhr.status === 200) {
                let data = xhr.response;
                contacts.innerHTML = data;
            }
        }
    }
    xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    xhr.send("searchTerm=" + searchTerm);
}