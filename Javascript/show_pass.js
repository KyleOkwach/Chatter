const passToggle = document.querySelector('.btn-pass');
const passField = document.querySelector('input[type="password"');
const passEye = document.querySelector('.pass-eye');
let visible = false;

passToggle.onclick = (e) => {
    e.preventDefault();
    visible = !visible;
    if(visible) {
        passField.type = "text";
        passEye.icon = "ic:baseline-remove-red-eye";
    } else {
        passField.type = "password";
        passEye.icon = "mdi:eye-off";
    }
}