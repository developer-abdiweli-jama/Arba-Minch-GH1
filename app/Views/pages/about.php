<?php 
use App\Core\View;
require_once __DIR__ . '/../layouts/partials/header.php'; 
?>

<!-- Hero Section -->
<section class="relative bg-blue-900 text-white py-20 md:py-32">
    <div class="absolute inset-0 bg-black opacity-50"></div>
    <div class="container mx-auto px-4 relative z-10 text-center">
        <h1 class="text-4xl md:text-5xl font-bold mb-4">About Our Hospital</h1>
        <p class="text-xl">Committed to excellence in healthcare since 1985</p>
    </div>
</section>

<!-- About Content -->
<section class="py-16 bg-white">
    <div class="container mx-auto px-4">
        <div class="flex flex-col md:flex-row items-center gap-12">
            <div class="md:w-1/2">
                <img src="<?= APP_URL ?>/assets/images/hospital-building.jpg" alt="Arba Minch General Hospital" class="rounded-lg shadow-lg">
            </div>
            <div class="md:w-1/2">
                <h2 class="text-3xl font-bold text-blue-900 mb-6">Our Story</h2>
                <div class="prose max-w-none">
                    <p class="mb-4">Founded in 1985, Arba Minch General Hospital has grown from a small community clinic to a leading regional healthcare provider serving southern Ethiopia.</p>
                    <p class="mb-4">Our 150-bed facility offers comprehensive medical services with a team of over 50 specialists and 200 support staff committed to patient-centered care.</p>
                    <p>We continuously invest in advanced medical technology and staff training to deliver world-class healthcare to our community.</p>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Mission & Vision -->
<section class="py-16 bg-gray-50">
    <div class="container mx-auto px-4">
        <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
            <div class="bg-white p-8 rounded-lg shadow-md">
                <div class="text-blue-900 text-4xl mb-4">
                    <i class="fas fa-bullseye"></i>
                </div>
                <h3 class="text-2xl font-bold mb-4">Our Mission</h3>
                <p>To provide compassionate, high-quality healthcare services that improve the lives of individuals and communities we serve, through clinical excellence, innovative treatments, and preventive care.</p>
            </div>
            <div class="bg-white p-8 rounded-lg shadow-md">
                <div class="text-blue-900 text-4xl mb-4">
                    <i class="fas fa-eye"></i>
                </div>
                <h3 class="text-2xl font-bold mb-4">Our Vision</h3>
                <p>To be the leading healthcare institution in southern Ethiopia, recognized for excellence in patient care, medical education, and community health initiatives.</p>
            </div>
        </div>
    </div>
</section>

<!-- Team Section -->
<section class="py-16 bg-white">
    <div class="container mx-auto px-4">
        <div class="text-center mb-12">
            <h2 class="text-3xl font-bold text-blue-900 mb-2">Leadership Team</h2>
            <div class="w-20 h-1 bg-blue-600 mx-auto"></div>
        </div>
        
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-8">
            <?php foreach ($leadership as $leader): ?>
            <div class="bg-white rounded-lg shadow-md overflow-hidden hover:shadow-lg transition">
                <div class="h-64 bg-gray-200 bg-cover bg-center" 
                     style="background-image: url('<?= APP_URL ?>/uploads/staff/<?= htmlspecialchars($leader['photo']) ?>')"></div>
                <div class="p-4 text-center">
                    <h3 class="font-bold text-lg"><?= htmlspecialchars($leader['name']) ?></h3>
                    <p class="text-blue-600"><?= htmlspecialchars($leader['position']) ?></p>
                    <p class="text-sm text-gray-600 mt-2"><?= htmlspecialchars($leader['qualification']) ?></p>
                </div>
            </div>
            <?php endforeach; ?>
        </div>
    </div>
</section>

<?php require_once __DIR__ . '/../layouts/partials/footer.php'; ?>