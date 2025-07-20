/**
 * Dashboard Module
 * Handles all dashboard-specific functionality
 */
class Dashboard {
    constructor() {
        this.initCharts();
        this.initStatsCards();
        this.initRecentActivities();
    }

    initCharts() {
        // Initialize any dashboard charts
        if (typeof Chart !== 'undefined') {
            // Example: Patient statistics chart
            const ctx = document.getElementById('patientStatsChart');
            if (ctx) {
                new Chart(ctx, {
                    type: 'line',
                    data: {
                        labels: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun'],
                        datasets: [{
                            label: 'Patients',
                            data: [65, 59, 80, 81, 56, 72],
                            borderColor: '#2563eb',
                            tension: 0.1
                        }]
                    },
                    options: {
                        responsive: true,
                        plugins: {
                            legend: {
                                position: 'top',
                            }
                        }
                    }
                });
            }
        }
    }

    initStatsCards() {
        // Add click handlers to stat cards if they have data-target attributes
        document.querySelectorAll('.stat-card[data-target]').forEach(card => {
            card.addEventListener('click', () => {
                window.location.href = card.dataset.target;
            });
            
            // Add hover effects
            card.addEventListener('mouseenter', () => {
                card.classList.add('shadow-lg');
            });
            
            card.addEventListener('mouseleave', () => {
                card.classList.remove('shadow-lg');
            });
        });
    }

    initRecentActivities() {
        // Initialize any recent activities functionality
        const activityItems = document.querySelectorAll('.activity-item');
        activityItems.forEach(item => {
            item.addEventListener('click', () => {
                const target = item.dataset.target;
                if (target) {
                    window.location.href = target;
                }
            });
        });
    }
}

// Initialize when DOM is loaded
document.addEventListener('DOMContentLoaded', () => {
    if (document.querySelector('.dashboard-page')) {
        new Dashboard();
    }
});

// Export for module system
if (typeof module !== 'undefined' && module.exports) {
    module.exports = Dashboard;
}