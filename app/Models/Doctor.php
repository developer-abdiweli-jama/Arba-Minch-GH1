<?php
namespace App\Models;

use PDO;

class Doctor {
    protected $db;

    public function __construct() {
        $this->db = new PDO("mysql:host=" . DB_HOST . ";dbname=" . DB_NAME, DB_USER, DB_PASS);
        $this->db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    }

    public function create($data) {
        $stmt = $this->db->prepare("INSERT INTO doctors (user_id, specialty, education, experience, phone, address, profile_picture, availability) VALUES (?, ?, ?, ?, ?, ?, ?, ?)");
        $stmt->execute([
            $data['user_id'],
            $data['specialty'],
            $data['education'],
            $data['experience'],
            $data['phone'] ?? null,
            $data['address'] ?? null,
            $data['profile_picture'] ?? null,
            $data['availability'] ?? null
        ]);
    }

    public function findAll() {
        $stmt = $this->db->query("SELECT u.id, u.full_name, d.specialty, d.education, d.experience, d.phone, d.address, d.profile_picture, d.availability FROM users u JOIN doctors d ON u.id = d.user_id WHERE u.role = 'doctor'");
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function findAllWithUserInfo() {
        $stmt = $this->db->query("SELECT d.id, u.full_name, d.specialty, d.education, d.experience FROM users u JOIN doctors d ON u.id = d.user_id WHERE u.role = 'doctor'");
        return $stmt->fetchAll(\PDO::FETCH_ASSOC);
    }

    public function findById($id) {
        $stmt = $this->db->prepare("SELECT u.id, u.full_name, d.specialty, d.education, d.experience, d.phone, d.address, d.profile_picture, d.availability FROM users u JOIN doctors d ON u.id = d.user_id WHERE d.id = ?");
        $stmt->execute([$id]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }
}
?>