<?php
namespace App\Controllers;

use App\Core\Controller;
use App\Core\AuthMiddleware;
use App\Core\View;
use App\Models\MedicalRecord;
use App\Models\Patient;
use App\Models\AuditLog;

class MedicalRecordController extends Controller {
    public function create($appointment_id = null) {
        AuthMiddleware::check('doctor');
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $medicalRecord = new MedicalRecord();
            $medicalRecord->create([
                'patient_id' => $_POST['patient_id'],
                'doctor_id' => $_SESSION['user_id'],
                'appointment_id' => $appointment_id,
                'visit_date' => $_POST['visit_date'],
                'diagnosis' => $_POST['diagnosis'],
                'prescription' => $_POST['prescription'],
                'test_results' => $_POST['test_results'],
                'notes' => $_POST['notes']
            ]);

            // Add audit log
            $auditLog = new AuditLog();
            $auditLog->create([
                'user_id' => $_SESSION['user_id'],
                'action' => 'medical_record_create',
                'details' => "Medical record created for Patient ID {$_POST['patient_id']} by Doctor ID {$_SESSION['user_id']}"
            ]);

            $this->redirect('dashboard/doctor');
        } else {
            $patient = new Patient();
            $patients = $patient->findAll();
            View::render('medical_records/create', ['patients' => $patients, 'appointment_id' => $appointment_id]);
        }
    }

    public function view($patient_id = null) {
        AuthMiddleware::check(['doctor', 'patient']);
        $medicalRecord = new MedicalRecord();
        $records = $_SESSION['role'] === 'patient' ? $medicalRecord->findByPatient($_SESSION['user_id']) : $medicalRecord->findByPatient($patient_id);
        View::render('medical_records/view', ['records' => $records]);
    }
}
?>