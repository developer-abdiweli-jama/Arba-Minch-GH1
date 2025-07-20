<?php
use App\Core\View;
?>

<section class="bg-gray-100 py-12">
    <div class="container mx-auto px-4">
        <h2 class="section-title">Medical Records</h2>
        <div class="grid grid-cols-1 gap-6">
            <?php foreach ($records as $record): ?>
                <div class="service-card p-6">
                    <h3 class="text-xl font-bold mb-2">Visit on <?php echo $record['visit_date']; ?></h3>
                    <p><strong>Doctor:</strong> <?php echo htmlspecialchars($record['doctor_name']); ?></p>
                    <p><strong>Diagnosis:</strong> <?php echo htmlspecialchars($record['diagnosis'] ?? 'N/A'); ?></p>
                    <p><strong>Prescription:</strong> <?php echo htmlspecialchars($record['prescription'] ?? 'N/A'); ?></p>
                    <p><strong>Test Results:</strong> <?php echo htmlspecialchars($record['test_results'] ?? 'N/A'); ?></p>
                    <p><strong>Notes:</strong> <?php echo htmlspecialchars($record['notes'] ?? 'N/A'); ?></p>
                </div>
            <?php endforeach; ?>
        </div>
    </div>
</section>
?>
