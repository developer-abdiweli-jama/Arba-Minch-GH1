<?php require_once __DIR__ . '/../layouts/header.php'; ?>
<section class="bg-gray-100 py-12">
    <div class="container mx-auto px-4">
        <form method="POST" action="<?php echo APP_URL; ?>/patients/create" class="max-w-md mx-auto space-y-4">
            <h2 class="text-xl font-bold mb-4">Add New Patient</h2>

            <div>
                <label for="full_name" class="block text-sm font-medium">Full Name</label>
                <input type="text" name="full_name" id="full_name" class="w-full p-2 border rounded" required>
            </div>
            <div>
                <label for="email" class="block text-sm font-medium">Email</label>
                <input type="email" name="email" id="email" class="w-full p-2 border rounded" required>
            </div>
            <div>
                <label for="gender" class="block text-sm font-medium">Gender</label>
                <select name="gender" id="gender" class="w-full p-2 border rounded" required>
                    <option value="">Select</option>
                    <option value="male">Male</option>
                    <option value="female">Female</option>
                    <option value="other">Other</option>
                </select>
            </div>
            <div>
                <label for="date_of_birth" class="block text-sm font-medium">Date of Birth</label>
                <input type="date" name="date_of_birth" id="date_of_birth" class="w-full p-2 border rounded" required>
            </div>
            <div>
                <label for="phone" class="block text-sm font-medium">Phone</label>
                <input type="text" name="phone" id="phone" class="w-full p-2 border rounded">
            </div>
            <div>
                <label for="address" class="block text-sm font-medium">Address</label>
                <textarea name="address" id="address" class="w-full p-2 border rounded"></textarea>
            </div>
            <div>
                <label for="emergency_contact" class="block text-sm font-medium">Emergency Contact</label>
                <input type="text" name="emergency_contact" id="emergency_contact" class="w-full p-2 border rounded">
            </div>
            <div>
                <label for="blood_type" class="block text-sm font-medium">Blood Type</label>
                <input type="text" name="blood_type" id="blood_type" class="w-full p-2 border rounded">
            </div>
            <div>
                <label for="medical_conditions" class="block text-sm font-medium">Medical Conditions</label>
                <textarea name="medical_conditions" id="medical_conditions" class="w-full p-2 border rounded"></textarea>
            </div>

            <input type="hidden" name="csrf_token" value="<?php echo $_SESSION['csrf_token']; ?>">

            <button type="submit" class="w-full bg-blue-600 text-white p-2 rounded hover:bg-blue-700">Add Patient</button>
        </form>
    </div>
</section>

<?php require_once __DIR__ . '/../layouts/footer.php'; ?>