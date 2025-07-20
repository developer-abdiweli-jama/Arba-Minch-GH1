<?php
use App\Core\View;
?>

<section class="bg-gray-100 py-12">
    <div class="container mx-auto px-4">
        <h2 class="section-title">Add New Doctor</h2>
        <form method="POST" action="<?php echo APP_URL; ?>/doctors/create" class="max-w-md mx-auto space-y-4" enctype="multipart/form-data">
            <div>
                <label for="full_name" class="block text-sm font-medium">Full Name</label>
                <input type="text" name="full_name" id="full_name" class="w-full p-2 border rounded" required>
            </div>
            <div>
                <label for="email" class="block text-sm font-medium">Email</label>
                <input type="email" name="email" id="email" class="w-full p-2 border rounded" required>
            </div>
            <div>
                <label for="password" class="block text-sm font-medium">Password</label>
                <input type="password" name="password" id="password" class="w-full p-2 border rounded" required>
            </div>
            <div>
                <label for="specialty" class="block text-sm font-medium">Specialty</label>
                <input type="text" name="specialty" id="specialty" class="w-full p-2 border rounded" required>
            </div>
            <div>
                <label for="education" class="block text-sm font-medium">Education</label>
                <input type="text" name="education" id="education" class="w-full p-2 border rounded" required>
            </div>
            <div>
                <label for="experience" class="block text-sm font-medium">Experience</label>
                <input type="text" name="experience" id="experience" class="w-full p-2 border rounded" required>
            </div>
            <div>
                <label for="phone" class="block text-sm font-medium">Phone</label>
                <input type="text" name="phone" id="phone" class="w-full p-2 border rounded">
            </div>
            <div>
                <label for="address" class="block text-sm font-medium">Address</label>
                <textarea name="address" id="address" class="w-full p-2 border rounded" rows="4"></textarea>
            </div>
            <div>
                <label for="profile_picture" class="block text-sm font-medium">Profile Picture</label>
                <input type="file" name="profile_picture" id="profile_picture" class="w-full p-2 border rounded">
            </div>
            <div>
                <label for="availability" class="block text-sm font-medium">Availability</label>
                <textarea name="availability" id="availability" class="w-full p-2 border rounded" rows="4"></textarea>
            </div>
            <input type="hidden" name="csrf_token" value="<?php echo $_SESSION['csrf_token']; ?>">
            <button type="submit" class="w-full bg-blue-600 text-white p-2 rounded hover:bg-blue-700">Add Doctor</button>
        </form>
    </div>
</section>
<?php /**PATH C:\xampp\htdocs\hospital\app\views\doctors\create.blade.php ENDPATH**/ ?>