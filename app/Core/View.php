<?php
namespace App\Core;

class View {
    public static function render($view, $data = []) {
        extract($data);
        
        // Include header
        require_once BASE_PATH . '/app/Views/layouts/partials/header.php';
        
        // Include the main view content
        $viewPath = BASE_PATH . "/app/Views/{$view}.php";
        if (!file_exists($viewPath)) {
            throw new \Exception("View file not found: {$view}");
        }
        require_once $viewPath;
        
        // Include footer
        require_once BASE_PATH . '/app/Views/layouts/partials/footer.php';
    }

    public static function renderPartial($view, $data = []) {
        extract($data);
        $viewPath = BASE_PATH . "/app/Views/{$view}.php";
        if (!file_exists($viewPath)) {
            throw new \Exception("View file not found: {$view}");
        }
        require_once $viewPath;
    }

    public static function redirect($url) {
        header("Location: " . APP_URL . "/{$url}");
        exit;
    }
}