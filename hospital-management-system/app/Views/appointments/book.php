<?php
use App\Core\View;
use App\Models\Doctor;

$doctorModel = new Doctor();
$doctors = $doctorModel->findAll();
?>

<section class="bg-apointment relative py-12">
    <div class="hero-overlay2"></div>
    <div class="container1 mx-auto px-4 text-white text-center">
        <h2 class="section-title text-white">Book an Appointment</h2>
        <p class="mb-6">Schedule your visit with our expert doctors.</p>
    </div>
</section>

<section class="py-12">
    <div class="container mx-auto px-4">
        <form method="POST" action="<?php echo APP_URL; ?>/appointments/book" class="max-w-md mx-auto space-y-4">
            <div>
                <label for="gender" class="block text-sm font-medium">Gender</label>
                <select name="gender" id="gender" class="custom-select">
                    <option value="male">Male</option>
                    <option value="female">Female</option>
                </select>
            </div>
            <div>
                <label for="doctor_id" class="block text-sm font-medium">Doctor</label>
                <select name="doctor_id" id="doctor_id" class="custom-select">
                    <?php foreach ($doctors as $doctor): ?>
                        <option value="<?php echo $doctor['id']; ?>"><?php echo htmlspecialchars($doctor['full_name']); ?> (<?php echo $doctor['specialty']; ?>)</option>
                    <?php endforeach; ?>
                </select>
            </div>
            <div>
                <label for="appointment_date" class="block text-sm font-medium">Appointment Date</label>
                <input type="datetime-local" name="appointment_date" id="appointment_date" class="w-full p-2 border rounded" required>
            </div>
            <input type="hidden" name="csrf_token" value="<?php echo $_SESSION['csrf_token']; ?>">
            <button type="submit" class="w-full bg-blue-600 text-white p-2 rounded hover:bg-blue-700">Submit</button>
        </form>
    </div>
</section>
?>