    </main>

    <footer class="bg-blue-900 text-white pt-12 pb-6">
        <div class="container mx-auto px-4">
            <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                <!-- Contact Info -->
                <div>
                    <h3 class="text-xl font-bold mb-4">Contact Us</h3>
                    <ul class="space-y-2">
                        <li class="flex items-start">
                            <i class="fas fa-map-marker-alt mt-1 mr-2"></i>
                            <span>Arba Minch General Hospital, 123 Main Street, Ethiopia</span>
                        </li>
                        <li class="flex items-center">
                            <i class="fas fa-phone-alt mr-2"></i>
                            <span>(+251) 681-812-255</span>
                        </li>
                        <li class="flex items-center">
                            <i class="fas fa-envelope mr-2"></i>
                            <span>contact@arbaminchhospital.com</span>
                        </li>
                    </ul>
                </div>
                
                <!-- Quick Links -->
                <div>
                    <h3 class="text-xl font-bold mb-4">Quick Links</h3>
                    <ul class="space-y-2">
                        <li><a href="<?= APP_URL ?>/home" class="hover:underline">Home</a></li>
                        <li><a href="<?= APP_URL ?>/about" class="hover:underline">About Us</a></li>
                        <li><a href="<?= APP_URL ?>/services" class="hover:underline">Our Services</a></li>
                        <li><a href="<?= APP_URL ?>/doctors" class="hover:underline">Our Doctors</a></li>
                        <li><a href="<?= APP_URL ?>/contact" class="hover:underline">Contact</a></li>
                    </ul>
                </div>
                
                <!-- Newsletter -->
                <div>
                    <h3 class="text-xl font-bold mb-4">Newsletter</h3>
                    <form class="flex flex-col space-y-3">
                        <input type="email" placeholder="Your Email" class="px-4 py-2 rounded text-gray-800">
                        <button type="submit" class="bg-blue-600 hover:bg-blue-700 text-white px-4 py-2 rounded">
                            Subscribe
                        </button>
                    </form>
                </div>
            </div>
            
            <div class="border-t border-blue-800 mt-8 pt-6 text-center">
                <p>&copy; <?= date('Y') ?> Arba Minch General Hospital. All rights reserved.</p>
            </div>
        </div>
    </footer>
    
    <script src="<?= APP_URL ?>/assets/js/main.js"></script>
</body>
</html>