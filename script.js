function validateForm() {
    // Reset error messages
    document.getElementById('emailError').textContent = '';
    document.getElementById('passwordError').textContent = '';

    // Get form values
    var email = document.getElementById('email').value;
    var password = document.getElementById('password').value;

    // Email validation
    if (!isValidEmail(email)) {
        document.getElementById('emailError').textContent = 'Invalid email format';
        alert('Invalid email format');
        return false;
    }

    // Password validation
    if (password.length < 6) {
        document.getElementById('passwordError').textContent = 'Password must be at least 6 characters';
        alert('Password must be at least 6 characters');
        return false;
    }

    // If all validations pass, the form can be submitted
    return true;
}

function isValidEmail(email) {
    // Basic email validation using a regular expression
    var emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
    return emailRegex.test(email);
}
