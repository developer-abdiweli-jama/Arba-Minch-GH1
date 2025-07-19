<?php
use App\Core\View;
?>

<section class="bg-gray-100 py-12">
    <div class="container mx-auto px-4">
        <h2 class="section-title"><?php echo isset($title) ? $title : 'Doctor Dashboard'; ?></h2>
        <p class="text-center mb-6">Welcome, Doctor! View your upcoming appointments.</p>
        <div class="service-card p-6">
            <h3 class="text-xl font-bold mb-2">Upcoming Appointments</h3>
            <p>Check your schedule and manage appointments.</p>
            <a href="<?php echo APP_URL; ?>/appointments/manage" class="text-blue-600 hover:underline">View Schedule</a>
        </div>
    </div>
</section>
?>