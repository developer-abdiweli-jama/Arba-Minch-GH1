/**
 * Sidebar Module
 * Handles all sidebar functionality
 */
class Sidebar {
    constructor() {
        this.sidebar = document.querySelector('.sidebar');
        this.toggleButton = document.querySelector('[data-toggle="sidebar"]');
        this.init();
    }

    init() {
        if (this.toggleButton && this.sidebar) {
            // Toggle sidebar
            this.toggleButton.addEventListener('click', () => this.toggle());
            
            // Close when clicking outside
            document.addEventListener('click', (e) => {
                if (!this.sidebar.contains(e.target) && !e.target.closest('[data-toggle="sidebar"]')) {
                    this.close();
                }
            });
            
            // Close on Escape key
            document.addEventListener('keydown', (e) => {
                if (e.key === 'Escape') {
                    this.close();
                }
            });
            
            // Highlight current page
            this.highlightCurrentPage();
        }
    }

    toggle() {
        this.sidebar.classList.toggle('active');
        document.body.classList.toggle('sidebar-active');
    }

    open() {
        this.sidebar.classList.add('active');
        document.body.classList.add('sidebar-active');
    }

    close() {
        this.sidebar.classList.remove('active');
        document.body.classList.remove('sidebar-active');
    }

    highlightCurrentPage() {
        const currentPath = window.location.pathname.split('/')[1] || 'dashboard';
        const navItems = document.querySelectorAll('.nav-item');
        
        navItems.forEach(item => {
            const link = item.querySelector('a').getAttribute('href').split('/')[1];
            if (link === currentPath) {
                item.classList.add('active');
            }
        });
    }
}

// Initialize when DOM is loaded
document.addEventListener('DOMContentLoaded', () => {
    if (document.querySelector('.sidebar')) {
        new Sidebar();
    }
});

// Export for module system
if (typeof module !== 'undefined' && module.exports) {
    module.exports = Sidebar;
}