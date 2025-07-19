document.addEventListener('DOMContentLoaded', function () {
    const loginForm = document.querySelector('form[action*="/auth/login"]');
    const registerForm = document.querySelector('form[action*="/auth/register"]');
    const contactForm = document.querySelector('form[action*="/contact"]');

    if (loginForm) {
        loginForm.addEventListener('submit', function (e) {
            const email = document.getElementById('email').value;
            const password = document.getElementById('password').value;
            let errors = [];

            if (!email.match(/^[^\s@]+@[^\s@]+\.[^\s@]+$/)) {
                errors.push('Invalid email format');
                document.getElementById('email').classList.add('border-red-500');
            }
            if (password.length < 8) {
                errors.push('Password must be at least 8 characters');
                document.getElementById('password').classList.add('border-red-500');
            }

            if (errors.length > 0) {
                e.preventDefault();
                alert(errors.join('\n'));
            }
        });
    }

    if (registerForm) {
        registerForm.addEventListener('submit', function (e) {
            const fullName = document.getElementById('full_name').value;
            const email = document.getElementById('email').value;
            const password = document.getElementById('password').value;
            const confirmPassword = document.getElementById('confirm_password').value;
            let errors = [];

            if (fullName.length < 2) {
                errors.push('Full name must be at least 2 characters');
                document.getElementById('full_name').classList.add('border-red-500');
            }
            if (!email.match(/^[^\s@]+@[^\s@]+\.[^\s@]+$/)) {
                errors.push('Invalid email format');
                document.getElementById('email').classList.add('border-red-500');
            }
            if (password.length < 8) {
                errors.push('Password must be at least 8 characters');
                document.getElementById('password').classList.add('border-red-500');
            }
            if (password !== confirmPassword) {
                errors.push('Passwords do not match');
                document.getElementById('confirm_password').classList.add('border-red-500');
            }

            if (errors.length > 0) {
                e.preventDefault();
                alert(errors.join('\n'));
            }
        });
    }

    if (contactForm) {
        contactForm.addEventListener('submit', function (e) {
            const fullName = document.getElementById('full_name').value;
            const email = document.getElementById('email').value;
            const message = document.getElementById('message').value;
            let errors = [];

            if (fullName.length < 2) {
                errors.push('Full name must be at least 2 characters');
                document.getElementById('full_name').classList.add('border-red-500');
            }
            if (!email.match(/^[^\s@]+@[^\s@]+\.[^\s@]+$/)) {
                errors.push('Invalid email format');
                document.getElementById('email').classList.add('border-red-500');
            }
            if (message.length < 10) {
                errors.push('Message must be at least 10 characters');
                document.getElementById('message').classList.add('border-red-500');
            }

            if (errors.length > 0) {
                e.preventDefault();
                alert(errors.join('\n'));
            }
        });
    }
});