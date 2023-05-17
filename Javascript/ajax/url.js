const contField = document.querySelector(".contact-id");

const urlParam = (parameter) => {
    let params = new URLSearchParams(window.location.search);
    // return params.get(parameter);
    return params;
}

console.log(urlParam("user"));

// setInterval(() => {
//     let xhr = new XMLHttpRequest;

//     xhr.open("POST", "chat.php", true);

//     xhr.onload = () => {
//         if(xhr.readyState == xhr.DONE) {
//             if(xhr.status == 200) {
//                 // console.log("Sync")
//                 console.log(contField.value);
//             }
//         }
//     }
//     // xhr.send();
//     xhr.send(contField.value);

// }, 500);