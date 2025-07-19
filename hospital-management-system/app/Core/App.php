<?php
namespace App\Core;

use Exception;

class App {
    protected $routes;

    public function __construct() {
        // Load routes from web.php
        $this->routes = require_once __DIR__ . '/../../routes/web.php';

        // Generate CSRF token for POST requests
        if (session_status() === PHP_SESSION_ACTIVE && !isset($_SESSION['csrf_token'])) {
            $_SESSION['csrf_token'] = bin2hex(random_bytes(32));
        }
    }

    public function run() {
        try {
            // Get request URL and method
            $url = $_GET['url'] ?? '';
            $url = rtrim($url, '/');
            $method = $_SERVER['REQUEST_METHOD'];

            // Validate CSRF token for POST requests
            if ($method === 'POST') {
                if (!isset($_POST['csrf_token']) || $_POST['csrf_token'] !== $_SESSION['csrf_token']) {
                    header('HTTP/1.1 403 Forbidden');
                    echo 'Invalid CSRF token';
                    return;
                }
                // Regenerate CSRF token after POST
                $_SESSION['csrf_token'] = bin2hex(random_bytes(32));
            }

            // Match route
            if (!isset($this->routes[$method])) {
                throw new Exception('Method not allowed');
            }

            foreach ($this->routes[$method] as $route => $handler) {
                // Convert route to regex pattern
                $pattern = preg_replace('#\(/\)#', '/?', preg_quote($route, '#'));
                $pattern = str_replace('\(\d+\)', '(\d+)', $pattern);
                $pattern = "#^$pattern$#";

                if (preg_match($pattern, $url, $matches)) {
                    array_shift($matches); // Remove full match
                    list($controller, $action) = $handler;

                    // Validate controller and method
                    if (!class_exists($controller)) {
                        throw new Exception("Controller $controller not found");
                    }
                    if (!method_exists($controller, $action)) {
                        throw new Exception("Method $action not found in $controller");
                    }

                    // Instantiate controller and call method
                    $controllerInstance = new $controller();
                    call_user_func_array([$controllerInstance, $action], $matches);
                    return;
                }
            }

            // Handle 404
            header('HTTP/1.1 404 Not Found');
            echo '404 Not Found';
        } catch (Exception $e) {
            // Handle errors
            header('HTTP/1.1 500 Internal Server Error');
            echo 'Error: ' . htmlspecialchars($e->getMessage());
            // Log error to audit log
            if (class_exists('\App\Models\AuditLog') && session_status() === PHP_SESSION_ACTIVE) {
                $auditLog = new \App\Models\AuditLog();
                $auditLog->create([
                    'user_id' => $_SESSION['user_id'] ?? null,
                    'action' => 'error',
                    'details' => 'Application error: ' . $e->getMessage()
                ]);
            }
        }
    }

    // Helper to get CSRF token for views
    public static function getCsrfToken() {
        return $_SESSION['csrf_token'] ?? '';
    }
}
?>