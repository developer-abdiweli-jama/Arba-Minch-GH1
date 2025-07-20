<?php
namespace App\Models;

use PDO;
use App\Core\Database;

class User {
    protected $db;

    public function __construct() {
        $this->db = Database::getInstance()->getConnection();
    }

    public function findByEmail($email) {
        $stmt = $this->db->prepare("SELECT * FROM users WHERE email = :email");
        $stmt->execute(['email' => $email]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function create($data) {
        $stmt = $this->db->prepare("
            INSERT INTO users (full_name, email, password, role, created_at) 
            VALUES (:full_name, :email, :password, :role, NOW())
        ");
        $stmt->execute([
            'full_name' => $data['full_name'],
            'email' => $data['email'],
            'password' => $data['password'],
            'role' => $data['role']
        ]);
        return $this->db->lastInsertId();
    }

    public function findById($id) {
        $stmt = $this->db->prepare("SELECT * FROM users WHERE id = :id");
        $stmt->execute(['id' => $id]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }
}