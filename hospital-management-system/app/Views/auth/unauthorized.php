<?php
use App\Core\View;
?>
<section class="bg-gray-100 py-12">
    <div class="container mx-auto px-4 text-center">
        <h2 class="text-3xl font-bold mb-4">Unauthorized Access</h2>
        <p class="mb-6">You do not have permission to access this page.</p>
        <a href="<?php echo APP_URL; ?>/home" class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700">Return to Home</a>
    </div>
</section>
?>