const form = document.querySelector(".form-signup");
const err = document.querySelector(".error-message");

form.onsubmit = (e) => {
    e.preventDefault();

    let xhr = new XMLHttpRequest;
    
    xhr.open("POST", "../../PHP/signup.php", true);
    xhr.onload = () => {
        if(xhr.readyState == xhr.DONE) {
            if(xhr.status == 200) {
                let data = xhr.response;
                if(data == "success") {
                    location.href = "index.php";
                } else {
                    err.style.display = "flex";
                    err.innerHTML = data;
                }
            }
        }
    }

    let formData = new FormData(form);
    xhr.send(formData);
}