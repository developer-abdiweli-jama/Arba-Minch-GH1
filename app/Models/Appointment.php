<?php
namespace App\Models;

use PDO;

class Appointment {
    protected $db;

    public function __construct() {
        $this->db = new PDO("mysql:host=" . DB_HOST . ";dbname=" . DB_NAME, DB_USER, DB_PASS);
        $this->db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    }

    public function create($data) {
        $stmt = $this->db->prepare("INSERT INTO appointments (patient_id, doctor_id, appointment_date, reason, notes, status) VALUES (?, ?, ?, ?, ?, ?)");
        $stmt->execute([
            $data['patient_id'],
            $data['doctor_id'],
            $data['appointment_date'],
            $data['reason'] ?? null,
            $data['notes'] ?? null,
            $data['status'] ?? 'pending'
        ]);
    }

    public function findByPatient($patient_id) {
        $stmt = $this->db->prepare("SELECT a.*, u.full_name AS doctor_name FROM appointments a JOIN doctors d ON a.doctor_id = d.id JOIN users u ON d.user_id = u.id WHERE a.patient_id = ?");
        $stmt->execute([$patient_id]);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function findByDoctor($doctor_id) {
        $stmt = $this->db->prepare("SELECT a.*, u.full_name AS patient_name FROM appointments a JOIN patients p ON a.patient_id = p.id JOIN users u ON p.user_id = u.id WHERE a.doctor_id = ?");
        $stmt->execute([$doctor_id]);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function findAll() {
        $stmt = $this->db->query("SELECT * FROM appointments");
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function updateStatus($id, $status) {
        $stmt = $this->db->prepare("UPDATE appointments SET status = ? WHERE id = ?");
        $stmt->execute([$status, $id]);
    }

    public function findById($id) {
        $stmt = $this->db->prepare("SELECT * FROM appointments WHERE id = ?");
        $stmt->execute([$id]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }
}
?>