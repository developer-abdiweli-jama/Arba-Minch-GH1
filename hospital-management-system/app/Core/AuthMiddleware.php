<?php
namespace App\Core;

class AuthMiddleware {
    public static function check($requiredRole = null) {
        session_start();
        if (!isset($_SESSION['user_id'])) {
            header('Location: ' . APP_URL . '/auth/login');
            exit;
        }

        if ($requiredRole && $_SESSION['role'] !== $requiredRole) {
            header('Location: ' . APP_URL . '/auth/unauthorized');
            exit;
        }
    }
}
?>