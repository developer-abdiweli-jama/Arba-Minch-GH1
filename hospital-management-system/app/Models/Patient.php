<?php
namespace App\Models;

use PDO;

class Patient {
    protected $db;

    public function __construct() {
        $this->db = new PDO("mysql:host=" . DB_HOST . ";dbname=" . DB_NAME, DB_USER, DB_PASS);
        $this->db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    }

    public function create($data) {
        $stmt = $this->db->prepare("INSERT INTO patients (user_id, gender, date_of_birth, phone, address, emergency_contact, blood_type, medical_conditions) VALUES (?, ?, ?, ?, ?, ?, ?, ?)");
        $stmt->execute([
            $data['user_id'],
            $data['gender'],
            $data['date_of_birth'] ?? null,
            $data['phone'] ?? null,
            $data['address'] ?? null,
            $data['emergency_contact'] ?? null,
            $data['blood_type'] ?? null,
            $data['medical_conditions'] ?? null
        ]);
    }

    public function findById($id) {
        $stmt = $this->db->prepare("SELECT p.*, u.full_name, u.email FROM patients p JOIN users u ON p.user_id = u.id WHERE p.id = ?");
        $stmt->execute([$id]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function findAll() {
        $stmt = $this->db->query("SELECT p.*, u.full_name, u.email FROM patients p JOIN users u ON p.user_id = u.id");
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
}
?>