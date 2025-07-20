<?php
use App\Core\View;
?>

<section class="bg-gray-100 py-12">
    <div class="container mx-auto px-4">
        <h2 class="section-title">Manage Doctors</h2>
        <a href="<?php echo APP_URL; ?>/doctors/create" class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700 mb-6 inline-block">Add Doctor</a>
        <div class="grid grid-cols-1 gap-6">
            <?php foreach ($doctors as $doctor): ?>
                <div class="service-card p-6">
                    <h3 class="text-xl font-bold mb-2"><?php echo htmlspecialchars($doctor['full_name']); ?></h3>
                    <p><strong>Specialty:</strong> <?php echo htmlspecialchars($doctor['specialty']); ?></p>
                    <p><strong>Education:</strong> <?php echo htmlspecialchars($doctor['education']); ?></p>
                    <p><strong>Experience:</strong> <?php echo htmlspecialchars($doctor['experience']); ?></p>
                    <p><strong>Phone:</strong> <?php echo htmlspecialchars($doctor['phone'] ?? 'N/A'); ?></p>
                    <p><strong>Address:</strong> <?php echo htmlspecialchars($doctor['address'] ?? 'N/A'); ?></p>
                </div>
            <?php endforeach; ?>
        </div>
    </div>
</section>
?>