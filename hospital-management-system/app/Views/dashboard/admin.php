<?php
use App\Core\View;
?>

<section class="bg-gray-100 py-12">
    <div class="container mx-auto px-4">
        <h2 class="section-title"><?php echo isset($title) ? $title : 'Admin Dashboard'; ?></h2>
        <p class="text-center mb-6">Welcome, Admin! Manage the hospital system here.</p>
        <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
            <div class="service-card p-6">
                <h3 class="text-xl font-bold mb-2">Appointments</h3>
                <p>View and manage all appointments.</p>
                <a href="<?php echo APP_URL; ?>/appointments/manage" class="text-blue-600 hover:underline">Manage</a>
            </div>
            <div class="service-card p-6">
                <h3 class="text-xl font-bold mb-2">Doctors</h3>
                <p>Add, update, or delete doctor profiles.</p>
                <a href="<?php echo APP_URL; ?>/doctors/index" class="text-blue-600 hover:underline">Manage</a>
            </div>
            <div class="service-card p-6">
                <h3 class="text-xl font-bold mb-2">Patients</h3>
                <p>Manage patient records.</p>
                <a href="<?php echo APP_URL; ?>/patients/index" class="text-blue-600 hover:underline">Manage</a>
            </div>
        </div>
    </div>
</section>
?>