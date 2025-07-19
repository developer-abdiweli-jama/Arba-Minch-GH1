<?php
use App\Core\View;
?>

<section class="bg-gray-100 py-12">
    <div class="container mx-auto px-4">
        <h2 class="section-title">Create Medical Record</h2>
        <form method="POST" action="<?php echo APP_URL; ?>/medical_records/create<?php echo isset($appointment_id) ? '/' . $appointment_id : ''; ?>" class="max-w-md mx-auto space-y-4">
            <div>
                <label for="patient_id" class="block text-sm font-medium">Patient</label>
                <select name="patient_id" id="patient_id" class="custom-select" required>
                    <?php foreach ($patients as $patient): ?>
                        <option value="<?php echo $patient['id']; ?>"><?php echo htmlspecialchars($patient['full_name']); ?></option>
                    <?php endforeach; ?>
                </select>
            </div>
            <div>
                <label for="visit_date" class="block text-sm font-medium">Visit Date</label>
                <input type="datetime-local" name="visit_date" id="visit_date" class="w-full p-2 border rounded" required>
            </div>
            <div>
                <label for="diagnosis" class="block text-sm font-medium">Diagnosis</label>
                <textarea name="diagnosis" id="diagnosis" class="w-full p-2 border rounded" rows="4"></textarea>
            </div>
            <div>
                <label for="prescription" class="block text-sm font-medium">Prescription</label>
                <textarea name="prescription" id="prescription" class="w-full p-2 border rounded" rows="4"></textarea>
            </div>
            <div>
                <label for="test_results" class="block text-sm font-medium">Test Results</label>
                <textarea name="test_results" id="test_results" class="w-full p-2 border rounded" rows="4"></textarea>
            </div>
            <div>
                <label for="notes" class="block text-sm font-medium">Notes</label>
                <textarea name="notes" id="notes" class="w-full p-2 border rounded" rows="4"></textarea>
            </div>
            <button type="submit" class="w-full bg-blue-600 text-white p-2 rounded hover:bg-blue-700">Submit</button>
        </form>
    </div>
</section>
?>