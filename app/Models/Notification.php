<?php
namespace App\Models;

use PDO;
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

class Notification {
    protected $db;

    public function __construct() {
        $this->db = new PDO("mysql:host=" . DB_HOST . ";dbname=" . DB_NAME, DB_USER, DB_PASS);
        $this->db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    }

    public function create($data) {
        $stmt = $this->db->prepare("INSERT INTO notifications (user_id, message, type, status) VALUES (?, ?, ?, ?)");
        $stmt->execute([$data['user_id'], $data['message'], $data['type'], $data['status'] ?? 'unread']);

        // Send email notification
        $user = $this->findUser($data['user_id']);
        $this->sendEmail($user['email'], $data['message']);
    }

    public function findByUser($user_id) {
        $stmt = $this->db->prepare("SELECT * FROM notifications WHERE user_id = ? ORDER BY created_at DESC");
        $stmt->execute([$user_id]);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    private function findUser($user_id) {
        $stmt = $this->db->prepare("SELECT email FROM users WHERE id = ?");
        $stmt->execute([$user_id]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    private function sendEmail($to, $message) {
        $mail = new PHPMailer(true);
        try {
            $mail->isSMTP();
            $mail->Host = SMTP_HOST; // Use config constant
            $mail->SMTPAuth = true;
            $mail->Username = SMTP_USER; // Use config constant
            $mail->Password = SMTP_PASS; // Use config constant
            $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
            $mail->Port = SMTP_PORT; // Use config constant

            $mail->setFrom(SMTP_FROM_EMAIL, SMTP_FROM_NAME); // Use config constants
            $mail->addAddress($to);
            $mail->Subject = 'Hospital Notification';
            $mail->Body = $message;

            $mail->send();
        } catch (Exception $e) {
            // Log email failure
            $this->logError("Email could not be sent. Mailer Error: {$mail->ErrorInfo}");
        }
    }

    private function logError($error) {
        $log_file = __DIR__ . '/../../storage/logs/app.log';
        file_put_contents($log_file, date('Y-m-d H:i:s') . " - ERROR: $error\n", FILE_APPEND);
    }
}
?>