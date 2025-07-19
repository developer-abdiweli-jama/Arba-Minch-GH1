<?php
namespace App\Controllers;

use App\Core\Controller;
use App\Core\AuthMiddleware;
use App\Core\View;

class PatientController extends Controller {
    public function index() {
        AuthMiddleware::check('admin');
        View::render('patients/index');
    }

    public function create() {
        AuthMiddleware::check('admin');
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            // Validate CSRF token
            if (!isset($_POST['csrf_token']) || $_POST['csrf_token'] !== $_SESSION['csrf_token']) {
                die('Invalid CSRF token');
            }

            // Collect and sanitize input
            $data = [
                'full_name' => trim($_POST['full_name']),
                'email' => trim($_POST['email']),
                'gender' => $_POST['gender'],
                'date_of_birth' => $_POST['date_of_birth'],
                'phone' => $_POST['phone'] ?? null,
                'address' => $_POST['address'] ?? null,
                'emergency_contact' => $_POST['emergency_contact'] ?? null,
                'blood_type' => $_POST['blood_type'] ?? null,
                'medical_conditions' => $_POST['medical_conditions'] ?? null
            ];

            // Save to database (you need a Patient model with a create method)
            $patientModel = new \App\Models\Patient();
            $patientModel->create($data);

            // Redirect or show success
            $this->redirect('patients/index');
        } else {
            // Show the form
            View::render('patients/create');
        }
    }

    // Add update, delete methods as needed
}
?>