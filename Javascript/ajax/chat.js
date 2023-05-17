const form = document.querySelector(".form-message"),
inputField = document.querySelector(".input-field"),
sendBtn = document.querySelector(".chat__area__buttons-send"),
chatArea = document.querySelector(".chat"),
nullArea = document.querySelector(".null"),
chatBox = document.querySelector(".messages"),
chatDetails = document.querySelector(".chat__details");

form.onsubmit = (e) => {
    e.preventDefault();
}

sendBtn.onclick = () => {
    let xhr = new XMLHttpRequest();
    xhr.open("POST", "PHP/send_chat.php", true);
    xhr.onload = () => {
        if(xhr.readyState === XMLHttpRequest.DONE) {
            if(xhr.status === 200) {
                inputField.value = ""
                scrollToBottom();
            }
        }
    }

    let formData = new FormData(form);
    xhr.send(formData);
}

setInterval(() => {
    let xhr = new XMLHttpRequest();
    let xhr2 = new XMLHttpRequest();

    const urlParams = new URLSearchParams(window.location.search);
    const paramValue = urlParams.get('user');

    xhr.open("POST", "PHP/fetch_chat.php", true);
    xhr2.open("POST", "PHP/fetch_contact.php", true);

    xhr.onload = () => {
        if(xhr.readyState === XMLHttpRequest.DONE) {
            if(xhr.status === 200) {
                let data = xhr.response;
                chatBox.innerHTML = data;
                if(data == "") {
                    chatArea.style.display = "none";
                    nullArea.style.display = "flex";
                } else {
                    chatArea.style.display = "flex";
                    nullArea.style.display = "none";
                }
                // (!chatBox.classList.contains("active")) && scrollToBottom();
            }
        }
    }

    xhr2.onload = () => {
        if(xhr2.readyState === XMLHttpRequest.DONE) {
            if(xhr2.status === 200) {
                let data = xhr2.response;
                chatDetails.innerHTML = data;
            }
        }
    }

    // let formData = new FormData(form);
    xhr.send(urlParams);
    xhr2.send(urlParams);
}, 1000);  // runs after 500ms

const scrollToBottom = () => {
    chatBox.scrollTop = chatBox.scrollHeight;
}

const exitChat = () => {
    window.history.replaceState({}, '', '/');
}

setInterval(() => {
    // shortcuts
    document.onkeyup = (e) => {
        if(e.key == 'Escape' && document.activeElement !==  inputField) {
            exitChat();
            console.log("exit");
        }
    }
}, 100);