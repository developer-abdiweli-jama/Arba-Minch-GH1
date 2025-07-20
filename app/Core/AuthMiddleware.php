<?php
namespace App\Core;

class AuthMiddleware {
    public static function check($requiredRole = null) {
        if (session_status() === PHP_SESSION_NONE) {
            session_start();
        }

        if (!isset($_SESSION['user_id'])) {
            View::redirect('auth/login');
        }

        if ($requiredRole) {
            if (is_array($requiredRole)) {
                if (!in_array($_SESSION['role'], $requiredRole)) {
                    View::redirect('auth/unauthorized');
                }
            } elseif ($_SESSION['role'] !== $requiredRole) {
                View::redirect('auth/unauthorized');
            }
        }
    }
}