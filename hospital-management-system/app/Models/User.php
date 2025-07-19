<?php
  namespace App\Models;

  use PDO;

  class User {
      protected $db;

      public function __construct() {
          $this->db = new PDO("mysql:host=" . DB_HOST . ";dbname=" . DB_NAME, DB_USER, DB_PASS);
          $this->db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
      }

      public function create($data) {
          $stmt = $this->db->prepare("INSERT INTO users (full_name, email, password, role) VALUES (?, ?, ?, ?)");
          $stmt->execute([$data['full_name'], $data['email'], $data['password'], $data['role']]);
          return $this->db->lastInsertId();
      }

      public function findByEmail($email) {
          $stmt = $this->db->prepare("SELECT * FROM users WHERE email = ?");
          $stmt->execute([$email]);
          return $stmt->fetch(PDO::FETCH_ASSOC);
      }

      public function findByRememberToken($token) {
          $stmt = $this->db->prepare("SELECT * FROM users WHERE remember_token = ?");
          $stmt->execute([$token]);
          return $stmt->fetch(PDO::FETCH_ASSOC);
      }

      public function updateRememberToken($user_id, $token) {
          $stmt = $this->db->prepare("UPDATE users SET remember_token = ? WHERE id = ?");
          $stmt->execute([$token, $user_id]);
      }
  }
  ?>