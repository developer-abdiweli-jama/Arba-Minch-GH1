<?php 
use App\Core\View;
require_once __DIR__ . '/../layouts/partials/header.php'; 
?>

<!-- Hero Section -->
<section class="relative bg-blue-900 text-white py-20 md:py-32">
    <div class="absolute inset-0 bg-black opacity-50"></div>
    <div class="container mx-auto px-4 relative z-10 text-center">
        <h1 class="text-4xl md:text-5xl font-bold mb-4">Our Medical Services</h1>
        <p class="text-xl">Comprehensive healthcare solutions for all your needs</p>
    </div>
</section>

<!-- Services Section -->
<section class="py-16 bg-gray-50">
    <div class="container mx-auto px-4">
        <div class="text-center mb-12">
            <h2 class="text-3xl font-bold text-blue-900 mb-2">Specialized Care</h2>
            <div class="w-20 h-1 bg-blue-600 mx-auto"></div>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
            <!-- Emergency Care -->
            <div class="bg-white rounded-lg shadow-md overflow-hidden hover:shadow-lg transition">
                <div class="h-48 bg-cover bg-center" style="background-image: url('<?= APP_URL ?>/assets/images/emergency.jpg')"></div>
                <div class="p-6">
                    <h3 class="text-xl font-bold mb-2">Emergency Care</h3>
                    <p class="text-gray-600 mb-4">24/7 emergency services with state-of-the-art trauma center.</p>
                    <ul class="space-y-2 text-sm">
                        <li class="flex items-start">
                            <i class="fas fa-check-circle text-green-500 mt-1 mr-2"></i>
                            <span>Advanced life support</span>
                        </li>
                        <li class="flex items-start">
                            <i class="fas fa-check-circle text-green-500 mt-1 mr-2"></i>
                            <span>Trauma specialists</span>
                        </li>
                        <li class="flex items-start">
                            <i class="fas fa-check-circle text-green-500 mt-1 mr-2"></i>
                            <span>Ambulance services</span>
                        </li>
                    </ul>
                </div>
            </div>

            <!-- Cardiology -->
            <div class="bg-white rounded-lg shadow-md overflow-hidden hover:shadow-lg transition">
                <div class="h-48 bg-cover bg-center" style="background-image: url('<?= APP_URL ?>/assets/images/cardiology.jpg')"></div>
                <div class="p-6">
                    <h3 class="text-xl font-bold mb-2">Cardiology</h3>
                    <p class="text-gray-600 mb-4">Comprehensive heart care with advanced diagnostics.</p>
                    <ul class="space-y-2 text-sm">
                        <li class="flex items-start">
                            <i class="fas fa-check-circle text-green-500 mt-1 mr-2"></i>
                            <span>Echocardiography</span>
                        </li>
                        <li class="flex items-start">
                            <i class="fas fa-check-circle text-green-500 mt-1 mr-2"></i>
                            <span>Stress testing</span>
                        </li>
                        <li class="flex items-start">
                            <i class="fas fa-check-circle text-green-500 mt-1 mr-2"></i>
                            <span>Cardiac rehabilitation</span>
                        </li>
                    </ul>
                </div>
            </div>

            <!-- Additional services would follow the same pattern -->
        </div>
    </div>
</section>

<!-- Appointment CTA -->
<section class="py-16 bg-white">
    <div class="container mx-auto px-4 text-center">
        <h2 class="text-3xl font-bold text-blue-900 mb-6">Ready to Schedule?</h2>
        <p class="text-xl mb-8 max-w-2xl mx-auto">Book an appointment with our specialists today.</p>
        <a href="<?= APP_URL ?>/appointments/book" class="bg-blue-600 hover:bg-blue-700 text-white px-8 py-3 rounded-md font-semibold inline-block">
            Book Appointment
        </a>
    </div>
</section>

<?php require_once __DIR__ . '/../layouts/partials/footer.php'; ?>