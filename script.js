function validateForm() {
    
    document.getElementById('emailError').textContent = '';
    document.getElementById('passwordError').textContent = '';
    var email = document.getElementById('email').value;
    var password = document.getElementById('password').value;
    if (!isValidEmail(email)) {
        document.getElementById('emailError').textContent = 'Invalid email format';
        alert('Invalid email format');
        return false;
    }

    if (password.length < 6) {
        document.getElementById('passwordError').textContent = 'Password must be at least 6 characters';
        alert('Password must be at least 6 characters');
        return false;
    }
    return true;
}

function isValidEmail(email) {
    
    var emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
    return emailRegex.test(email);
}
