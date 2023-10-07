document.addEventListener('DOMContentLoaded', function () {
    const emailInput = document.getElementById('email');
    const passwordInput = document.getElementById('password');

    const emailError = document.getElementById('emailError');
    const passwordError = document.getElementById('passwordError');
    const submitButton = document.getElementById('submitButton');

    function validateEmail() {
        const isValid = /^[^\s@]+@[^\s@]+\.[^\s@]+$/.test(emailInput.value);
        emailError.textContent = isValid ? '' : 'Invalid email address';
        return isValid;
    }


    function validatePassword() {
        const isValid = passwordInput.value.length != "";
        passwordError.textContent = isValid ? '' : 'Passwords cannot be empty';
        return isValid;
    }

    function validateForm() {
        const isEmailValid = validateEmail();
        const isPasswordValid = validatePassword();
        submitButton.disabled = !(isEmailValid && isPasswordValid);
    }

    emailInput.addEventListener('input', validateForm);
    passwordInput.addEventListener('input', validateForm);
});

async function sendForm(){
    var email = document.getElementById('email').value;
    var password = document.getElementById('password').value;

    const xhr = new XMLHttpRequest();
    xhr.open("POST", "http://localhost:8000/api/login", true);

    xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
    
    xhr.onreadystatechange = () => {
        if (xhr.readyState === XMLHttpRequest.DONE && xhr.status === 200) {
            window.location.href = "home";
        }
    };
    
    var data = `email=${encodeURIComponent(email)}&password=${encodeURIComponent(password)}`;
    xhr.send(data);
}
