<?php
use App\Core\View;
?>

<section class="bg-gray-100 py-12">
    <div class="container mx-auto px-4">
        <h2 class="section-title"><?php echo isset($title) ? $title : 'Patient Dashboard'; ?></h2>
        <p class="text-center mb-6">Welcome, Patient! View your appointment history.</p>
        <div class="service-card p-6">
            <h3 class="text-xl font-bold mb-2">Appointment History</h3>
            <p>View your past and upcoming appointments.</p>
            <a href="<?php echo APP_URL; ?>/appointments/history" class="text-blue-600 hover:underline">View History</a>
        </div>
    </div>
</section>
?>