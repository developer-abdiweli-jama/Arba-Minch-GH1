<?php 
use App\Core\View;
require_once __DIR__ . '/../layouts/partials/header.php'; 
?>

<!-- Hero Section -->
<section class="relative bg-blue-900 text-white py-20 md:py-32">
    <div class="absolute inset-0 bg-black opacity-50"></div>
    <div class="container mx-auto px-4 relative z-10">
        <div class="max-w-2xl">
            <h1 class="text-4xl md:text-5xl font-bold mb-4">Quality Healthcare Made Simple</h1>
            <p class="text-xl mb-8">Experience world-class medical care in the heart of Arba Minch</p>
            <div class="flex flex-wrap gap-4">
                <a href="<?= APP_URL ?>/services" 
                   class="bg-white text-blue-900 hover:bg-gray-100 px-6 py-3 rounded-md font-semibold">
                    Our Services
                </a>
                <a href="<?= APP_URL ?>/appointments/book" 
                   class="bg-transparent border-2 border-white hover:bg-blue-800 px-6 py-3 rounded-md font-semibold">
                    Book Appointment
                </a>
            </div>
        </div>
    </div>
</section>

<!-- Stats Bar -->
<div class="bg-white shadow-lg -mt-10 mx-4 rounded-lg z-20 relative">
    <div class="container mx-auto px-4 py-6 grid grid-cols-2 md:grid-cols-4 gap-4">
        <div class="text-center p-4">
            <div class="text-3xl font-bold text-blue-900">50+</div>
            <div class="text-gray-600">Expert Doctors</div>
        </div>
        <div class="text-center p-4">
            <div class="text-3xl font-bold text-blue-900">24/7</div>
            <div class="text-gray-600">Emergency Care</div>
        </div>
        <div class="text-center p-4">
            <div class="text-3xl font-bold text-blue-900">100+</div>
            <div class="text-gray-600">Happy Patients</div>
        </div>
        <div class="text-center p-4">
            <div class="text-3xl font-bold text-blue-900">15+</div>
            <div class="text-gray-600">Years Experience</div>
        </div>
    </div>
</div>

<!-- Services Preview -->
<section class="py-16 bg-gray-50">
    <div class="container mx-auto px-4">
        <div class="text-center mb-12">
            <h2 class="text-3xl font-bold text-blue-900 mb-2">Our Services</h2>
            <div class="w-20 h-1 bg-blue-600 mx-auto"></div>
        </div>
        
        <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
            <div class="bg-white rounded-lg shadow-md p-6 hover:shadow-lg transition">
                <div class="text-blue-900 text-4xl mb-4">
                    <i class="fas fa-heartbeat"></i>
                </div>
                <h3 class="text-xl font-bold mb-2">Cardiology</h3>
                <p class="text-gray-600">Comprehensive heart care with advanced diagnostics.</p>
                <a href="<?= APP_URL ?>/services#cardiology" class="text-blue-600 hover:underline mt-4 inline-block">
                    Learn More <i class="fas fa-arrow-right ml-1"></i>
                </a>
            </div>
            
            <div class="bg-white rounded-lg shadow-md p-6 hover:shadow-lg transition">
                <div class="text-blue-900 text-4xl mb-4">
                    <i class="fas fa-bone"></i>
                </div>
                <h3 class="text-xl font-bold mb-2">Orthopedics</h3>
                <p class="text-gray-600">Specialized bone and joint treatments.</p>
                <a href="<?= APP_URL ?>/services#orthopedics" class="text-blue-600 hover:underline mt-4 inline-block">
                    Learn More <i class="fas fa-arrow-right ml-1"></i>
                </a>
            </div>
            
            <div class="bg-white rounded-lg shadow-md p-6 hover:shadow-lg transition">
                <div class="text-blue-900 text-4xl mb-4">
                    <i class="fas fa-baby"></i>
                </div>
                <h3 class="text-xl font-bold mb-2">Pediatrics</h3>
                <p class="text-gray-600">Compassionate care for infants and children.</p>
                <a href="<?= APP_URL ?>/services#pediatrics" class="text-blue-600 hover:underline mt-4 inline-block">
                    Learn More <i class="fas fa-arrow-right ml-1"></i>
                </a>
            </div>
        </div>
        
        <div class="text-center mt-12">
            <a href="<?= APP_URL ?>/services" class="bg-blue-600 hover:bg-blue-700 text-white px-6 py-3 rounded-md font-semibold inline-block">
                View All Services
            </a>
        </div>
    </div>
</section>

<!-- Doctors Preview -->
<section class="py-16 bg-white">
    <div class="container mx-auto px-4">
        <div class="text-center mb-12">
            <h2 class="text-3xl font-bold text-blue-900 mb-2">Our Doctors</h2>
            <p class="text-gray-600 max-w-2xl mx-auto">Meet our team of highly qualified specialists</p>
            <div class="w-20 h-1 bg-blue-600 mx-auto mt-4"></div>
        </div>
        
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6">
            <?php foreach ($doctors as $doctor): ?>
            <div class="bg-white rounded-lg shadow-md overflow-hidden hover:shadow-lg transition">
                <div class="h-48 bg-gray-200 bg-cover bg-center" 
                     style="background-image: url('<?= APP_URL ?>/uploads/doctors/<?= htmlspecialchars($doctor['profile_picture']) ?>')"></div>
                <div class="p-4">
                    <h3 class="font-bold text-lg"><?= htmlspecialchars($doctor['full_name']) ?></h3>
                    <p class="text-blue-600"><?= htmlspecialchars($doctor['specialty']) ?></p>
                    <div class="flex mt-2 text-yellow-400">
                        <?= str_repeat('★', $doctor['rating']) ?><?= str_repeat('☆', 5 - $doctor['rating']) ?>
                    </div>
                    <a href="<?= APP_URL ?>/doctors/profile/<?= $doctor['id'] ?>" class="text-blue-600 hover:underline text-sm mt-2 inline-block">
                        View Profile
                    </a>
                </div>
            </div>
            <?php endforeach; ?>
        </div>
        
        <div class="text-center mt-12">
            <a href="<?= APP_URL ?>/doctors" class="bg-white text-blue-600 border border-blue-600 hover:bg-blue-50 px-6 py-3 rounded-md font-semibold inline-block">
                Meet All Doctors
            </a>
        </div>
    </div>
</section>

<!-- CTA Section -->
<section class="py-16 bg-blue-900 text-white">
    <div class="container mx-auto px-4 text-center">
        <h2 class="text-3xl font-bold mb-6">Need Medical Help?</h2>
        <p class="text-xl mb-8 max-w-2xl mx-auto">Contact us today to schedule an appointment with our specialists.</p>
        <div class="flex flex-wrap justify-center gap-4">
            <a href="<?= APP_URL ?>/appointments/book" class="bg-white text-blue-900 hover:bg-gray-100 px-6 py-3 rounded-md font-semibold">
                Book Appointment
            </a>
            <a href="<?= APP_URL ?>/contact" class="bg-transparent border-2 border-white hover:bg-blue-800 px-6 py-3 rounded-md font-semibold">
                Contact Us
            </a>
        </div>
    </div>
</section>

<?php require_once __DIR__ . '/../layouts/partials/footer.php'; ?>