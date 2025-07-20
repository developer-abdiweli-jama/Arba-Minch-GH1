<?php
namespace App\Models;
use PDO;

class AuditLog {
    protected $db;

    public function __construct() {
        $this->db = new PDO("mysql:host=" . DB_HOST . ";dbname=" . DB_NAME, DB_USER, DB_PASS);
        $this->db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    }

    public function create($data) {
        $stmt = $this->db->prepare("INSERT INTO audit_logs (user_id, action, details) VALUES (?, ?, ?)");
        $stmt->execute([$data['user_id'], $data['action'], $data['details']]);

        // Ensure log directory exists
        $log_dir = __DIR__ . '/../../storage/logs';
        if (!is_dir($log_dir)) {
            mkdir($log_dir, 0777, true);
        }

        // Log to file
        $log_file = $log_dir . '/app.log';
        file_put_contents($log_file, date('Y-m-d H:i:s') . " - {$data['action']}: {$data['details']}\n", FILE_APPEND);
    }

    public function findAll() {
        $stmt = $this->db->query("SELECT al.*, u.full_name FROM audit_logs al LEFT JOIN users u ON al.user_id = u.id ORDER BY al.created_at DESC");
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
}
?>