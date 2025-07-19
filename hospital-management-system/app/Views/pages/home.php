<?php
use App\Core\View;
require_once __DIR__ . '/../layouts/header.php';
?>
<section class="hero-section bg-cover bg-center" style="background-image: url('<?php echo APP_URL; ?>/assets/images/Hero.jpg');">
    <div class="hero-overlay bg-black opacity-50 absolute inset-0"></div>
    <div class="hero-content relative text-white text-center py-20">
        <h1 class="text-4xl md:text-5xl font-bold mb-4">Caring for Life</h1>
        <p class="text-xl mb-6">Leading the Way in Medical Excellence</p>
        <div class="space-x-4">
            <a href="<?php echo APP_URL; ?>/services" class="bg-blue-600 text-white px-6 py-3 rounded-lg hover:bg-blue-700">Our Services</a>
            <a href="<?php echo APP_URL; ?>/appointments/book" class="bg-blue-600 text-white px-6 py-3 rounded-lg hover:bg-blue-700">Book an Appointment</a>
        </div>
    </div>
</section>

<section class="py-12 bg-gray-100">
    <div class="container mx-auto px-4">
        <h2 class="text-3xl font-bold text-center mb-8">Our Services</h2>
        <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
            <div class="service-card p-6 bg-white rounded-lg shadow-md">
                <h3 class="text-xl font-bold mb-2">Free Checkup</h3>
                <p>Regular health checkups to ensure your well-being.</p>
            </div>
            <div class="service-card p-6 bg-white rounded-lg shadow-md">
                <h3 class="text-xl font-bold mb-2">Cardiogram</h3>
                <p>Advanced heart monitoring and diagnostics.</p>
            </div>
            <div class="service-card p-6 bg-white rounded-lg shadow-md">
                <h3 class="text-xl font-bold mb-2">Blood Bank</h3>
                <p>Safe and reliable blood donation and transfusion services.</p>
            </div>
        </div>
    </div>
</section>

<section class="py-12">
    <div class="container mx-auto px-4">
        <h2 class="text-3xl font-bold text-center mb-8">Our Specialties</h2>
        <div class="grid grid-cols-1 md:grid-cols-4 gap-6">
            <div class="service-card p-6 bg-white rounded-lg shadow-md">
                <h3 class="text-xl font-bold mb-2">Neurology</h3>
                <p>Brain and nervous system care.</p>
            </div>
            <div class="service-card p-6 bg-white rounded-lg shadow-md">
                <h3 class="text-xl font-bold mb-2">Orthopedics</h3>
                <p>Bone and joint health.</p>
            </div>
            <div class="service-card p-6 bg-white rounded-lg shadow-md">
                <h3 class="text-xl font-bold mb-2">Oncology</h3>
                <p>Cancer diagnosis and treatment.</p>
            </div>
            <div class="service-card p-6 bg-white rounded-lg shadow-md">
                <h3 class="text-xl font-bold mb-2">Cardiology</h3>
                <p>Heart and vascular health.</p>
            </div>
        </div>
    </div>
</section>
<?php require_once __DIR__ . '/../layouts/footer.php'; ?>