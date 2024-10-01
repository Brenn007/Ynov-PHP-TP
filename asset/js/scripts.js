// Example: Smooth scroll for anchor links
document.querySelectorAll('a[href^="#"]').forEach(anchor => {
    anchor.addEventListener('click', function(e) {
        e.preventDefault();

        document.querySelector(this.getAttribute('href')).scrollIntoView({
            behavior: 'smooth'
        });
    });
});

// Example: Form validation
document.querySelector('form').addEventListener('submit', function(e) {
    const email = document.querySelector('#email').value;
    const message = document.querySelector('#message').value;

    if (!email || !message) {
        e.preventDefault();
        alert('Please fill in all required fields.');
    }
});

// Example: Toggle visibility of password field
document.querySelector('#togglePassword').addEventListener('click', function() {
    const passwordField = document.querySelector('#password');
    const type = passwordField.getAttribute('type') === 'password' ? 'text' : 'password';
    passwordField.setAttribute('type', type);
    this.classList.toggle('fa-eye-slash');
});
