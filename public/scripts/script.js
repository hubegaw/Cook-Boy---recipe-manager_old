const form = document.querySelector('form');
const emailInput = form.querySelector('input[name="register-email"]')
const passwordInput = form.querySelector('input[name="register-password"]')
const nameInput = form.querySelector('input[name="register-name"]')

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

emailInput.addEventListener('keyup', validateEmail);
passwordInput.addEventListener('keyup', handlePasswordValidation);
nameInput.addEventListener('keyup', handleNameValidation);