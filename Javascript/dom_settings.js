const settingsBtn = document.querySelector(".btn-settings");
const logoutBtn = document.querySelector(".logout");
const settings = document.querySelector(".settings");

let settingsVisible = false;

settingsBtn.onclick = () => {
    settingsVisible = !settingsVisible;
}

logoutBtn.onclick = () => {
    window.location.href = "logout/";
}

setInterval(() => {
    if(settingsVisible) {
        settings.style.display = "flex";
    } else {
        settings.style.display = "none";
    }
}, 50);