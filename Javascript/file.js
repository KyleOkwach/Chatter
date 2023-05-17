const fileBtn = document.querySelector('.btn-file');
const fileInput = document.querySelector('.form-file');
const fileName = document.querySelector(".file-name");

// upload file
fileBtn.onclick = (e) => {
    e.preventDefault();
    fileInput.click();
}

setInterval(() => {
    if(fileInput.value != ""){
        fileName.innerHTML = fileInput.value.split(/(\\|\/)/g).pop();
    }
    // fileName.innerHTML = "ee";
}, 50);