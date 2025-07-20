<?php
namespace App\Controllers;

use App\Core\Controller;
use App\Core\AuthMiddleware;
use App\Core\View;
use App\Models\Appointment;
use App\Models\Notification;
use App\Models\AuditLog;

class AppointmentController extends Controller {
    public function book() {
        AuthMiddleware::check('patient');
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $appointment = new Appointment();
            $appointment->create([
                'patient_id' => $_SESSION['user_id'],
                'doctor_id' => $_POST['doctor_id'],
                'appointment_date' => $_POST['appointment_date'],
                'reason' => $_POST['reason'],
                'status' => 'pending'
            ]);

            // Create notification for doctor
            $notification = new Notification();
            $notification->create([
                'user_id' => $_POST['doctor_id'],
                'message' => "New appointment request from patient ID {$_SESSION['user_id']} for {$_POST['appointment_date']}",
                'type' => 'appointment'
            ]);

            // Add audit log
            $auditLog = new AuditLog();
            $auditLog->create([
                'user_id' => $_SESSION['user_id'],
                'action' => 'appointment_create',
                'details' => "Appointment created for Doctor ID {$_POST['doctor_id']} on {$_POST['appointment_date']}"
            ]);

            $this->redirect('appointments/history');
        } else {
            View::render('appointments/book');
        }
    }

    public function manage() {
        AuthMiddleware::check('admin');
        $appointment = new Appointment();
        $appointments = $appointment->findAll();
        View::render('appointments/manage', ['appointments' => $appointments]);
    }

    public function history() {
        AuthMiddleware::check('patient');
        $appointment = new Appointment();
        $appointments = $appointment->findByPatient($_SESSION['user_id']);
        View::render('appointments/history', ['appointments' => $appointments]);
    }

    public function approve($appointment_id) {
        AuthMiddleware::check('doctor');
        $appointment = new Appointment();
        $appointment->updateStatus($appointment_id, 'confirmed');

        // Fetch appointment to get patient_id
        $appt = $appointment->findById($appointment_id);
        $patient_id = $appt ? $appt['patient_id'] : null;

        // Notify patient
        if ($patient_id) {
            $notification = new Notification();
            $notification->create([
                'user_id' => $patient_id,
                'message' => "Your appointment ID {$appointment_id} has been confirmed.",
                'type' => 'appointment'
            ]);
        }

        // Add audit log
        $auditLog = new AuditLog();
        $auditLog->create([
            'user_id' => $_SESSION['user_id'],
            'action' => 'appointment_approve',
            'details' => "Appointment ID {$appointment_id} approved by Doctor ID {$_SESSION['user_id']}"
        ]);

        $this->redirect('dashboard/doctor');
    }

    public function reject($appointment_id) {
        AuthMiddleware::check('doctor');
        $appointment = new Appointment();
        $appointment->updateStatus($appointment_id, 'cancelled');

        // Fetch appointment to get patient_id
        $appt = $appointment->findById($appointment_id);
        $patient_id = $appt ? $appt['patient_id'] : null;

        // Notify patient
        if ($patient_id) {
            $notification = new Notification();
            $notification->create([
                'user_id' => $patient_id,
                'message' => "Your appointment ID {$appointment_id} has been cancelled.",
                'type' => 'appointment'
            ]);
        }

        // Add audit log
        $auditLog = new AuditLog();
        $auditLog->create([
            'user_id' => $_SESSION['user_id'],
            'action' => 'appointment_reject',
            'details' => "Appointment ID {$appointment_id} rejected by Doctor ID {$_SESSION['user_id']}"
        ]);

        $this->redirect('dashboard/doctor');
    }
}
?>