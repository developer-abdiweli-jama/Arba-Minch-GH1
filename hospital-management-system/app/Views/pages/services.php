<?php
use App\Core\View;
require_once __DIR__ . '/../layouts/header.php';
?>
<section class="bg-cover bg-center" style="background-image: url('<?php echo APP_URL; ?>/assets/images/Service bg.png');" class="relative py-12">
    <div class="hero-overlay bg-black opacity-50 absolute inset-0"></div>
    <div class="container mx-auto px-4 text-white text-center relative z-10">
        <h2 class="text-3xl font-bold mb-4">Our Services</h2>
        <p class="mb-6">Comprehensive healthcare services tailored to your needs.</p>
    </div>
</section>

<section class="py-12 bg-gray-100">
    <div class="container mx-auto px-4">
        <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
            <div class="service-card p-6 bg-white rounded-lg shadow-md">
                <span class="text-4xl mb-4 block">🏥</span>
                <h3 class="text-xl font-bold mb-2">Emergency Care</h3>
                <p>24/7 emergency services with state-of-the-art facilities.</p>
            </div>
            <div class="service-card p-6 bg-white rounded-lg shadow-md">
                <span class="text-4xl mb-4 block">👶</span>
                <h3 class="text-xl font-bold mb-2">Pediatrics</h3>
                <p>Specialized care for infants, children, and adolescents.</p>
            </div>
            <div class="service-card p-6 bg-white rounded-lg shadow-md">
                <span class="text-4xl mb-4 block">🤰</span>
                <h3 class="text-xl font-bold mb-2">Maternity Care</h3>
                <p>Comprehensive care for expecting mothers and newborns.</p>
            </div>
            <div class="service-card p-6 bg-white rounded-lg shadow-md">
                <span class="text-4xl mb-4 block">🩺</span>
                <h3 class="text-xl font-bold mb-2">Free Checkup</h3>
                <p>Regular health checkups to ensure your well-being.</p>
            </div>
            <div class="service-card p-6 bg-white rounded-lg shadow-md">
                <span class="text-4xl mb-4 block">❤️</span>
                <h3 class="text-xl font-bold mb-2">Cardiogram</h3>
                <p>Advanced heart monitoring and diagnostics.</p>
            </div>
            <div class="service-card p-6 bg-white rounded-lg shadow-md">
                <span class="text-4xl mb-4 block">🧬</span>
                <h3 class="text-xl font-bold mb-2">DNA Testing</h3>
                <p>Genetic testing for personalized healthcare.</p>
            </div>
            <div class="service-card p-6 bg-white rounded-lg shadow-md">
                <span class="text-4xl mb-4 block">🩸</span>
                <h3 class="text-xl font-bold mb-2">Blood Bank</h3>
                <p>Safe and reliable blood donation and transfusion services.</p>
            </div>
            <div class="service-card p-6 bg-white rounded-lg shadow-md">
                <span class="text-4xl mb-4 block">🧴</span>
                <h3 class="text-xl font-bold mb-2">Dermatology</h3>
                <p>Expert care for skin, hair, and nail conditions.</p>
            </div>
            <div class="service-card p-6 bg-white rounded-lg shadow-md">
                <span class="text-4xl mb-4 block">🦴</span>
                <h3 class="text-xl font-bold mb-2">Orthopedic</h3>
                <p>Specialized treatment for bone and joint disorders.</p>
            </div>
        </div>
    </div>
</section>
<?php require_once __DIR__ . '/../layouts/footer.php'; ?>