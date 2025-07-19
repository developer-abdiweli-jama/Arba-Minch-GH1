<?php
use App\Core\View;
?>
<section class="bg-gray-100 py-8">
    <div class="container mx-auto px-4">
        <h2 class="text-3xl font-bold text-center mb-4">ARBA-MINCH-GH</h2>
        <p class="text-center mb-6">Create an account to get started.</p>
        <?php if (isset($error)): ?>
            <p class="text-red-500 text-center"><?php echo htmlspecialchars($error); ?></p>
        <?php endif; ?>
        <form method="POST" action="<?php echo APP_URL; ?>/auth/register" class="max-w-md mx-auto space-y-4" enctype="multipart/form-data">
            <input type="hidden" name="csrf_token" value="<?php echo $_SESSION['csrf_token']; ?>">
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
                <p class="text-sm text-gray-600">Password must be at least 8 characters long.</p>
            </div>
            <div>
                <label for="confirm_password" class="block text-sm font-medium">Confirm Password</label>
                <input type="password" name="confirm_password" id="confirm_password" class="w-full p-2 border rounded" required>
            </div>
            <div>
                <label for="role" class="block text-sm font-medium">Role</label>
                <select name="role" id="role" class="w-full p-2 border rounded" required>
                    <option value="">Select your role</option>
                    <option value="patient">Patient</option>
                    <option value="doctor">Doctor</option>
                </select>
            </div>
            <div>
                <label for="gender" class="block text-sm font-medium">Gender</label>
                <select name="gender" id="gender" class="w-full p-2 border rounded" required>
                    <option value="male">Male</option>
                    <option value="female">Female</option>
                </select>
            </div>
            <div>
                <label for="date_of_birth" class="block text-sm font-medium">Date of Birth</label>
                <input type="date" name="date_of_birth" id="date_of_birth" class="w-full p-2 border rounded">
            </div>
            <div>
                <label for="phone" class="block text-sm font-medium">Phone</label>
                <input type="text" name="phone" id="phone" class="w-full p-2 border rounded">
            </div>
            <div>
                <label for="address" class="block text-sm font-medium">Address</label>
                <input type="text" name="address" id="address" class="w-full p-2 border rounded">
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
            <div>
                <label for="specialty" class="block text-sm font-medium">Specialty (Doctors only)</label>
                <input type="text" name="specialty" id="specialty" class="w-full p-2 border rounded">
            </div>
            <div>
                <label for="education" class="block text-sm font-medium">Education (Doctors only)</label>
                <input type="text" name="education" id="education" class="w-full p-2 border rounded">
            </div>
            <div>
                <label for="experience" class="block text-sm font-medium">Experience (Doctors only)</label>
                <input type="text" name="experience" id="experience" class="w-full p-2 border rounded">
            </div>
            <div>
                <label for="profile_picture" class="block text-sm font-medium">Profile Picture (Doctors only)</label>
                <input type="file" name="profile_picture" id="profile_picture" class="w-full p-2 border rounded">
            </div>
            <div>
                <label for="availability" class="block text-sm font-medium">Availability (Doctors only, e.g., JSON format)</label>
                <input type="text" name="availability" id="availability" class="w-full p-2 border rounded">
            </div>
            <button type="submit" class="w-full bg-blue-600 text-white p-2 rounded hover:bg-blue-700">Register</button>
        </form>
        <p class="text-center mt-4">Already have an account? <a href="<?php echo APP_URL; ?>/auth/login" class="text-blue-600 hover:underline">Log in</a>.</p>
    </div>
</section>
?>