<?php
namespace App\Core;

class Controller {
    protected function view($view, $data = []) {
        // Extract data to variables
        extract($data);
        
        // Start output buffering
        ob_start();
        include "../app/Views/{$view}.php";
        $content = ob_get_clean();
        
        // Include the layout with default values
        $layoutData = array_merge([
            'content' => $content,
            'title' => $data['title'] ?? 'Arba Minch General Hospital',
            'noHeader' => false,
            'noFooter' => false,
            'showSidebar' => isset($_SESSION['user_id']),
            'currentPage' => explode('/', $view)[0],
            'cssFiles' => [],
            'jsFiles' => [],
            'bodyClass' => ''
        ], $data);
        
        extract($layoutData);
        include "../app/Views/layouts/app.php";
    }

    protected function redirect($url) {
        header("Location: " . APP_URL . "/{$url}");
        exit;
    }

    protected function jsonResponse($data, $statusCode = 200) {
        header('Content-Type: application/json');
        http_response_code($statusCode);
        echo json_encode($data);
        exit;
    }

    protected function validateCsrfToken() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            if (!isset($_POST['csrf_token']) || $_POST['csrf_token'] !== $_SESSION['csrf_token']) {
                header('HTTP/1.1 403 Forbidden');
                echo 'Invalid CSRF token';
                exit;
            }
        }
    }
}