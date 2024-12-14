const passwordInput = document.getElementById('password');
const strengthBar = document.getElementById('strength-bar');
const strengthText = document.getElementById('strength-text');


passwordInput.addEventListener('input', () => {
    const password = passwordInput.value;
    let strength = 0;

    if (password.match(/[a-z]/)) strength++;
    if (password.match(/[A-Z]/)) strength++;
    if (password.match(/[0-9]/)) strength++;
    if (password.match(/[\W_]/)) strength++;
    if (password.length >= 8) strength++;


    strengthBar.className = 'strength-bar';

    if (strength <= 2) {
        strengthBar.style.width = '33%';
        strengthBar.classList.add('weak');
        strengthText.textContent = 'Lemah';
    } else if (strength === 3 || strength === 4){
        strengthBar.style.width = '66%';
        strengthBar.classList.add('medium');
        strengthText.textContent = 'Sedang';
    } else if (strength === 5) {
        strengthBar.style.width = '100%';
        strengthBar.classList.add('strong');
        strengthText.textContent = 'kuat';
    } else {
        strengthBar.style.width = '0%';
        // strengthBar.classList.remove('weak', 'medium', 'strong');
        strengthBar.textContent ='';
    }

});



