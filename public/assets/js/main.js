// Core Application Initialization
document.addEventListener('DOMContentLoaded', function() {
    // Initialize all modules
    initTooltips();
    initSidebar();
    initFormValidation();
    
    // Add other initializations here
});

/**
 * Initialize Bootstrap Tooltips
 */
function initTooltips() {
    const tooltips = document.querySelectorAll('[data-toggle="tooltip"]');
    tooltips.forEach(tooltip => {
        new bootstrap.Tooltip(tooltip, {
            trigger: 'hover focus'
        });
    });
}

/**
 * Initialize Sidebar Toggle Functionality
 */
function initSidebar() {
    const sidebarToggle = document.querySelector('[data-toggle="sidebar"]');
    const sidebar = document.querySelector('.sidebar');
    
    if (sidebarToggle && sidebar) {
        // Toggle sidebar on button click
        sidebarToggle.addEventListener('click', function() {
            sidebar.classList.toggle('active');
            document.body.classList.toggle('sidebar-active');
        });
        
        // Close sidebar when clicking outside
        document.addEventListener('click', function(e) {
            if (!sidebar.contains(e.target) && !e.target.closest('[data-toggle="sidebar"]')) {
                sidebar.classList.remove('active');
                document.body.classList.remove('sidebar-active');
            }
        });
        
        // Close sidebar on Escape key
        document.addEventListener('keydown', function(e) {
            if (e.key === 'Escape') {
                sidebar.classList.remove('active');
                document.body.classList.remove('sidebar-active');
            }
        });
    }
}

/**
 * Initialize Form Validation
 * Now uses the dedicated form-validation.js module
 */
function initFormValidation() {
    // This is now handled by the form-validation module
    console.log('Form validation initialized');
}

// Export functions if using ES modules
if (typeof module !== 'undefined' && module.exports) {
    module.exports = {
        initTooltips,
        initSidebar,
        initFormValidation
    };
}