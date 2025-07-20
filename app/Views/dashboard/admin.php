<?php
$title = "Admin Dashboard";
$cssFiles = ['components/cards'];
$jsFiles = ['modules/dashboard'];
$currentPage = 'dashboard';
?>

<div class="container mx-auto px-4 py-6">
    <h2 class="text-2xl font-bold text-blue-900 mb-6">Admin Dashboard</h2>
    
    <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-8">
        <!-- Stat Cards -->
        <div class="bg-white rounded-lg shadow p-6">
            <div class="flex items-center">
                <div class="p-3 rounded-full bg-blue-100 text-blue-600 mr-4">
                    <i class="fas fa-procedures text-xl"></i>
                </div>
                <div>
                    <h3 class="text-2xl font-bold">1,248</h3>
                    <p class="text-gray-600">Total Patients</p>
                </div>
            </div>
        </div>
        
        <!-- More stat cards -->
    </div>
    
    <div class="bg-white rounded-lg shadow overflow-hidden">
        <div class="px-6 py-4 border-b border-gray-200 flex justify-between items-center">
            <h3 class="text-lg font-medium">Recent Appointments</h3>
            <a href="<?= APP_URL ?>/appointments" class="text-blue-600 hover:underline">View All</a>
        </div>
        <div class="overflow-x-auto">
            <table class="min-w-full">
                <!-- Table content -->
            </table>
        </div>
    </div>
</div>