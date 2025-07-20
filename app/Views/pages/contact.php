<?php 
use App\Core\View;
require_once __DIR__ . '/../layouts/partials/header.php'; 
?>

<!-- Hero Section -->
<section class="relative bg-blue-900 text-white py-20 md:py-32">
    <div class="absolute inset-0 bg-black opacity-50"></div>
    <div class="container mx-auto px-4 relative z-10 text-center">
        <h1 class="text-4xl md:text-5xl font-bold mb-4">Contact Us</h1>
        <p class="text-xl">We're here to help and answer any questions</p>
    </div>
</section>

<!-- Contact Content -->
<section class="py-16 bg-white">
    <div class="container mx-auto px-4">
        <div class="flex flex-col lg:flex-row gap-12">
            <!-- Contact Form -->
            <div class="lg:w-1/2">
                <h2 class="text-2xl font-bold text-blue-900 mb-6">Send Us a Message</h2>
                
                <?php if (isset($success)): ?>
                    <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded mb-6">
                        <?= htmlspecialchars($success) ?>
                    </div>
                <?php endif; ?>
                
                <?php if (!empty($errors)): ?>
                    <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded mb-6">
                        <ul class="list-disc pl-5">
                            <?php foreach ($errors as $error): ?>
                                <li><?= htmlspecialchars($error) ?></li>
                            <?php endforeach; ?>
                        </ul>
                    </div>
                <?php endif; ?>
                
                <form method="POST" action="<?= APP_URL ?>/contact" class="space-y-6">
                    <input type="hidden" name="csrf_token" value="<?= $_SESSION['csrf_token'] ?>">
                    
                    <div>
                        <label for="name" class="block text-gray-700 font-medium mb-2">Full Name</label>
                        <input type="text" id="name" name="name" required
                               class="w-full px-4 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500"
                               value="<?= htmlspecialchars($formData['name'] ?? '') ?>">
                    </div>
                    
                    <div>
                        <label for="email" class="block text-gray-700 font-medium mb-2">Email Address</label>
                        <input type="email" id="email" name="email" required
                               class="w-full px-4 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500"
                               value="<?= htmlspecialchars($formData['email'] ?? '') ?>">
                    </div>
                    
                    <div>
                        <label for="subject" class="block text-gray-700 font-medium mb-2">Subject</label>
                        <input type="text" id="subject" name="subject" required
                               class="w-full px-4 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500"
                               value="<?= htmlspecialchars($formData['subject'] ?? '') ?>">
                    </div>
                    
                    <div>
                        <label for="message" class="block text-gray-700 font-medium mb-2">Message</label>
                        <textarea id="message" name="message" rows="5" required
                                  class="w-full px-4 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500"><?= htmlspecialchars($formData['message'] ?? '') ?></textarea>
                    </div>
                    
                    <button type="submit" class="bg-blue-600 hover:bg-blue-700 text-white px-6 py-3 rounded-md font-semibold">
                        Send Message
                    </button>
                </form>
            </div>
            
            <!-- Contact Info -->
            <div class="lg:w-1/2">
                <h2 class="text-2xl font-bold text-blue-900 mb-6">Contact Information</h2>
                
                <div class="bg-gray-50 p-6 rounded-lg shadow-sm">
                    <div class="flex items-start mb-6">
                        <div class="text-blue-900 text-xl mr-4 mt-1">
                            <i class="fas fa-map-marker-alt"></i>
                        </div>
                        <div>
                            <h3 class="font-bold text-lg mb-1">Address</h3>
                            <p>Arba Minch General Hospital<br>
                            123 Main Street<br>
                            Arba Minch, Ethiopia</p>
                        </div>
                    </div>
                    
                    <div class="flex items-start mb-6">
                        <div class="text-blue-900 text-xl mr-4 mt-1">
                            <i class="fas fa-phone-alt"></i>
                        </div>
                        <div>
                            <h3 class="font-bold text-lg mb-1">Phone</h3>
                            <p>Emergency: (+251) 681-812-255<br>
                            Main: (+251) 123-456-789<br>
                            Fax: (+251) 123-456-788</p>
                        </div>
                    </div>
                    
                    <div class="flex items-start mb-6">
                        <div class="text-blue-900 text-xl mr-4 mt-1">
                            <i class="fas fa-envelope"></i>
                        </div>
                        <div>
                            <h3 class="font-bold text-lg mb-1">Email</h3>
                            <p>info@arbaminchhospital.com<br>
                            emergency@arbaminchhospital.com</p>
                        </div>
                    </div>
                    
                    <div class="flex items-start">
                        <div class="text-blue-900 text-xl mr-4 mt-1">
                            <i class="fas fa-clock"></i>
                        </div>
                        <div>
                            <h3 class="font-bold text-lg mb-1">Hours</h3>
                            <p>Emergency: 24/7<br>
                            Outpatient: Mon-Fri 8:00-17:00<br>
                            Administration: Mon-Fri 8:30-16:30</p>
                        </div>
                    </div>
                </div>
                
                <!-- Map -->
                <div class="mt-8 h-64 bg-gray-200 rounded-lg overflow-hidden">
                    <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3940.923981374928!2d37.55731531536252!3d8.992676993549848!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0x0!2zOMKwNTknMzMuNiJOIDM3wrAzMycyNS4yIkU!5e0!3m2!1sen!2set!4v1620000000000!5m2!1sen!2set" 
                            width="100%" height="100%" style="border:0;" allowfullscreen="" loading="lazy"></iframe>
                </div>
            </div>
        </div>
    </div>
</section>

<?php require_once __DIR__ . '/../layouts/partials/footer.php'; ?>