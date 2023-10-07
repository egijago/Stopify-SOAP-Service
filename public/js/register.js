document.addEventListener('DOMContentLoaded', function () {
    const emailInput = document.getElementById('email');
    const nameInput = document.getElementById('name');

    const emailError = document.getElementById('emailError');
    const nameError = document.getElementById('nameError');
    const submitButton = document.getElementById('submitButton');

    const passwordInput = document.getElementById('password');
    const confpasswordInput = document.getElementById('confpassword');
    const passwordError = document.getElementById('passwordError');

    function validateEmail() {
        const isValid = /^[^\s@]+@[^\s@]+\.[^\s@]+$/.test(emailInput.value);
        emailError.textContent = isValid ? '' : 'Invalid email address';
        return isValid;
    }

    function validateName() {
        const isValid = nameInput.value.trim() !== '';
        nameError.textContent = isValid ? '' : 'Username cannot be empty';
        return isValid;
    }

    function validatePassword() {
        const isValid = passwordInput.value.trim() == confpasswordInput.value.trim() && passwordInput.value.trim() !== '' && confpasswordInput.value.trim() !== '';
        passwordError.textContent = isValid ? '' : 'Passwords invalid';
        return isValid;
    }

    function validateForm() {
        const isEmailValid = validateEmail();
        const isNameValid = validateName();
        const isPasswordValid = validatePassword();
        submitButton.disabled = !(isEmailValid && isNameValid && isPasswordValid);
    }

    emailInput.addEventListener('input', validateForm);
    nameInput.addEventListener('input', validateForm);
    confpasswordInput.addEventListener('input', validateForm);
});

async function sendForm(){
    var email = document.getElementById('email').value;
    var password = document.getElementById('password').value;
    var name = document.getElementById('name').value;

    const xhr = new XMLHttpRequest();
    xhr.open("POST", "/api/register", true);

    xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");

    xhr.onreadystatechange = () => {
        if (xhr.readyState === XMLHttpRequest.DONE && xhr.status === 200) {
            console.log(xhr.responseText)
            window.location.href = "/login";
        }
    };
    
    var data = `email=${encodeURIComponent(email)}&username=${encodeURIComponent(name)}&password=${encodeURIComponent(password)}`;
    xhr.send(data);
}
