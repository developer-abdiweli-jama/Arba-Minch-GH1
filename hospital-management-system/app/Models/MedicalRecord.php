<?php
namespace App\Models;

use PDO;

class MedicalRecord {
    protected $db;

    public function __construct() {
        $this->db = new PDO("mysql:host=" . DB_HOST . ";dbname=" . DB_NAME, DB_USER, DB_PASS);
        $this->db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    }

    public function create($data) {
        $stmt = $this->db->prepare("INSERT INTO medical_records (patient_id, doctor_id, appointment_id, visit_date, diagnosis, prescription, test_results, notes) VALUES (?, ?, ?, ?, ?, ?, ?, ?)");
        $stmt->execute([
            $data['patient_id'],
            $data['doctor_id'],
            $data['appointment_id'] ?? null,
            $data['visit_date'],
            $data['diagnosis'] ?? null,
            $data['prescription'] ?? null,
            $data['test_results'] ?? null,
            $data['notes'] ?? null
        ]);
    }

    public function findByPatient($patient_id) {
        $stmt = $this->db->prepare("SELECT mr.*, u.full_name AS doctor_name FROM medical_records mr JOIN doctors d ON mr.doctor_id = d.id JOIN users u ON d.user_id = u.id WHERE mr.patient_id = ?");
        $stmt->execute([$patient_id]);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function findByDoctor($doctor_id) {
        $stmt = $this->db->prepare("SELECT mr.*, u.full_name AS patient_name FROM medical_records mr JOIN patients p ON mr.patient_id = p.id JOIN users u ON p.user_id = u.id WHERE mr.doctor_id = ?");
        $stmt->execute([$doctor_id]);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
}
?>