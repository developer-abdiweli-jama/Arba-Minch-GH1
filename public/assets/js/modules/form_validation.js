/**
 * Form Validation Module
 * Handles validation for all forms in the application
 */
class FormValidator {
    constructor() {
        this.forms = {
            login: {
                selector: 'form[action*="/auth/login"]',
                rules: {
                    email: {
                        required: true,
                        email: true
                    },
                    password: {
                        required: true,
                        minLength: 8
                    }
                }
            },
            register: {
                selector: 'form[action*="/auth/register"]',
                rules: {
                    full_name: {
                        required: true,
                        minLength: 2
                    },
                    email: {
                        required: true,
                        email: true
                    },
                    password: {
                        required: true,
                        minLength: 8
                    },
                    confirm_password: {
                        required: true,
                        matches: 'password'
                    }
                }
            },
            contact: {
                selector: 'form[action*="/contact"]',
                rules: {
                    full_name: {
                        required: true,
                        minLength: 2
                    },
                    email: {
                        required: true,
                        email: true
                    },
                    message: {
                        required: true,
                        minLength: 10
                    }
                }
            }
        };
        
        this.init();
    }

    init() {
        for (const [formName, config] of Object.entries(this.forms)) {
            const form = document.querySelector(config.selector);
            if (form) {
                this.setupFormValidation(form, config.rules);
            }
        }
    }

    setupFormValidation(form, rules) {
        form.addEventListener('submit', (e) => {
            e.preventDefault();
            const errors = this.validateForm(form, rules);
            
            if (Object.keys(errors).length === 0) {
                form.submit();
            } else {
                this.displayErrors(form, errors);
            }
        });

        // Add input event listeners to clear errors when typing
        Object.keys(rules).forEach(fieldName => {
            const input = form.querySelector(`[name="${fieldName}"]`);
            if (input) {
                input.addEventListener('input', () => {
                    this.clearError(input);
                });
            }
        });
    }

    validateForm(form, rules) {
        const errors = {};
        
        for (const [fieldName, fieldRules] of Object.entries(rules)) {
            const input = form.querySelector(`[name="${fieldName}"]`);
            const value = input?.value.trim();
            
            if (fieldRules.required && !value) {
                errors[fieldName] = 'This field is required';
                continue;
            }
            
            if (fieldRules.email && !this.validateEmail(value)) {
                errors[fieldName] = 'Please enter a valid email address';
            }
            
            if (fieldRules.minLength && value.length < fieldRules.minLength) {
                errors[fieldName] = `Must be at least ${fieldRules.minLength} characters`;
            }
            
            if (fieldRules.matches) {
                const matchInput = form.querySelector(`[name="${fieldRules.matches}"]`);
                if (value !== matchInput?.value.trim()) {
                    errors[fieldName] = 'Values do not match';
                }
            }
        }
        
        return errors;
    }

    validateEmail(email) {
        return /^[^\s@]+@[^\s@]+\.[^\s@]+$/.test(email);
    }

    displayErrors(form, errors) {
        // Clear previous errors
        form.querySelectorAll('.error-message').forEach(el => el.remove());
        form.querySelectorAll('.is-invalid').forEach(el => el.classList.remove('is-invalid'));
        
        // Add new errors
        for (const [fieldName, errorMessage] of Object.entries(errors)) {
            const input = form.querySelector(`[name="${fieldName}"]`);
            if (input) {
                input.classList.add('is-invalid');
                
                const errorElement = document.createElement('div');
                errorElement.className = 'error-message text-red-500 text-sm mt-1';
                errorElement.textContent = errorMessage;
                
                input.parentNode.appendChild(errorElement);
            }
        }
        
        // Scroll to first error
        const firstError = form.querySelector('.is-invalid');
        if (firstError) {
            firstError.scrollIntoView({ behavior: 'smooth', block: 'center' });
        }
    }

    clearError(input) {
        input.classList.remove('is-invalid');
        const errorElement = input.parentNode.querySelector('.error-message');
        if (errorElement) {
            errorElement.remove();
        }
    }
}

// Initialize when DOM is loaded
document.addEventListener('DOMContentLoaded', () => {
    new FormValidator();
});

// Export for module system
if (typeof module !== 'undefined' && module.exports) {
    module.exports = FormValidator;
}