<?php
use App\Core\View;
use App\Models\Appointment;

$appointmentModel = new Appointment();
$appointments = $appointmentModel->findByPatient($_SESSION['user_id']);
?>

<section class="bg-gray-100 py-12">
    <div class="container mx-auto px-4">
        <h2 class="section-title">Appointment History</h2>
        <p class="text-center mb-6">View your past and upcoming appointments.</p>
        <div class="grid grid-cols-1 gap-6">
            <?php foreach ($appointments as $appointment): ?>
                <div class="service-card p-6">
                    <h3 class="text-xl font-bold mb-2">Appointment on <?php echo $appointment['appointment_date']; ?></h3>
                    <p>Status: <?php echo htmlspecialchars($appointment['status']); ?></p>
                </div>
            <?php endforeach; ?>
        </div>
    </div>
</section>
?>