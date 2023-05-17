const contactField = document.querySelector(".contact-id");

const setState = (id) => {
    contactField.value = id;
    
    let xhr = new XMLHttpRequest;
    
    xhr.open("POST", "../../chat.php", true);

    xhr.send(id);
}

const changeState = (id) => {
    window.history.replaceState({}, '', '/contact?user='+id);
}
