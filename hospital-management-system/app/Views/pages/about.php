<?php
use App\Core\View;
require_once __DIR__ . '/../layouts/header.php';
?>
<section class="bg-gray-100 py-12">
    <div class="container mx-auto px-4">
        <h2 class="text-3xl font-bold text-center mb-8">About Us</h2>
        <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
            <div>
                <img src="<?php echo APP_URL; ?>/assets/images/about-us.png" alt="About Us" class="w-full rounded-lg shadow-lg">
            </div>
            <div>
                <p class="mb-4">Arba Minch General Hospital is a leading healthcare provider in the region, offering a wide range of medical services. Our mission is to deliver exceptional patient care with compassion, innovation, and excellence.</p>
                <p class="mb-4">Established in 1985, we have grown to become a trusted name in healthcare, serving thousands of patients annually. Our team of highly skilled doctors, nurses, and staff are dedicated to improving the health and well-being of our community.</p>
                <p class="mb-4">We are equipped with state-of-the-art facilities and cutting-edge technology to ensure the highest standards of medical care. From emergency services to specialized treatments, we are committed to meeting the diverse healthcare needs of our patients.</p>
                <a href="#" class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700">Learn More</a>
            </div>
        </div>
    </div>
</section>

<section class="py-12 bg-white">
    <div class="container mx-auto px-4">
        <h3 class="text-2xl font-bold mb-6 text-center">Our Mission & Vision</h3>
        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
            <div class="p-6 bg-white rounded-lg shadow-md">
                <h4 class="text-xl font-bold mb-2">Our Mission</h4>
                <p>To provide high-quality, patient-centered healthcare services that improve the lives of individuals and communities we serve.</p>
            </div>
            <div class="p-6 bg-white rounded-lg shadow-md">
                <h4 class="text-xl font-bold mb-2">Our Vision</h4>
                <p>To be the leading healthcare institution in the region, recognized for excellence in medical care, innovation, and community service.</p>
            </div>
        </div>
    </div>
</section>

<section class="py-12 bg-gray-100">
    <div class="container mx-auto px-4">
        <h3 class="text-3xl font-bold text-center mb-8">Our Core Values</h3>
        <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
            <div class="p-6 bg-white rounded-lg shadow-md">
                <h4 class="text-xl font-bold mb-2">Compassion</h4>
                <p>We treat every patient with empathy, kindness, and respect.</p>
            </div>
            <div class="p-6 bg-white rounded-lg shadow-md">
                <h4 class="text-xl font-bold mb-2">Excellence</h4>
                <p>We strive for the highest standards in medical care and service delivery.</p>
            </div>
            <div class="p-6 bg-white rounded-lg shadow-md">
                <h4 class="text-xl font-bold mb-2">Innovation</h4>
                <p>We embrace new technologies and practices to improve patient outcomes.</p>
            </div>
        </div>
    </div>
</section>
<?php require_once __DIR__ . '/../layouts/footer.php'; ?>