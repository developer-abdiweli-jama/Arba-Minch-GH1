<?php
/** @var array $doctors */
use App\Core\View;
?>
<?php require_once __DIR__ . '/../layouts/header.php'; ?>
<section class="bg-Doctors_images relative py-12">
    <div class="hero-overlay2"></div>
    <div class="container1 mx-auto px-4 text-white text-center">
        <h2 class="section-title text-white">Our Doctors</h2>
        <p class="mb-6">Meet our team of highly skilled and experienced healthcare professionals.</p>
    </div>
</section>

<section class="py-12">
    <div class="container mx-auto px-4">
        <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
            <?php foreach ($doctors as $doctor): ?>
                <div class="doctor-card p-6 bg-white rounded-lg shadow-lg">
                    <h3 class="text-xl font-bold mb-2"><?php echo htmlspecialchars($doctor['full_name']); ?></h3>
                    <p class="text-blue-600 font-semibold"><?php echo htmlspecialchars($doctor['specialty']); ?></p>
                    <p class="text-yellow-500 mb-2">★★★★☆</p>
                    <p class="mb-2">Department: <?php echo htmlspecialchars($doctor['specialty']); ?></p>
                    <p class="mb-2">Education: <?php echo htmlspecialchars($doctor['education']); ?></p>
                    <p class="mb-4">Experience: <?php echo htmlspecialchars($doctor['experience']); ?></p>
                    <a href="<?php echo APP_URL; ?>/appointments/book?doctor_id=<?php echo $doctor['id']; ?>" class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700">Book Appointment</a>
                </div>
            <?php endforeach; ?>
        </div>
    </div>
</section>
<?php require_once __DIR__ . '/../layouts/footer.php'; ?>