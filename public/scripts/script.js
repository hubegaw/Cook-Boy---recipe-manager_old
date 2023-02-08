const form = document.querySelector('div[id="sign-up"]');
const emailInput = form.querySelector('input[name="register-email"]')
const passwordInput = form.querySelector('input[name="register-password"]')
const nameInput = form.querySelector('input[name="register-name"]')

const content = document.querySelector('div[class="main-content"]')
const loginPanel = content.querySelector('div[id="log-in"]')
const registerPanel = content.querySelector('div[id="sign-up"]')

function isEmail(email) {
    return /\+@\S+\.\S+/.test(email);
}

function validatePassword(password) {
    return password.length >= 8 && /(?=.*[a-z])(?=.*[A-Z])(?=.*[0-9])(?=.{8,})/.test(password);
}

function validateName(name) {
    return name.length > 2;
}

function markValidation(element, condition) {
    !condition ? element.classList.add('no-valid') : element.classList.remove('no-valid');
}

function validateEmail() {
    setTimeout(function () {
            markValidation(emailInput, isEmail(emailInput.value));
        },
        2000
    );
}

function handlePasswordValidation() {
    setTimeout(function () {
            const condition = !validatePassword(
                passwordInput.value
            );
            markValidation(passwordInput, condition);
        },
        2000
    );
}

function handleNameValidation() {
    setTimeout(function () {
            markValidation(nameInput, validateName(nameInput.value));
        },
        2000
    );
}


document.getElementById("to-register").onclick = function () {
    loginPanel.style.display = "none";
    registerPanel.style.display = "flex";
}

document.getElementById("to-login").onclick = function () {
    loginPanel.style.display = "flex";
    registerPanel.style.display = "none";
}

emailInput.addEventListener('keyup', validateEmail);
passwordInput.addEventListener('keyup', handlePasswordValidation);
nameInput.addEventListener('keyup', handleNameValidation);