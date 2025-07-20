<?php
namespace App\Core;

use Exception;

class App {
    protected $routes;

    public function __construct() {
        $this->routes = require_once __DIR__ . '/../../routes/web.php';

        if (session_status() === PHP_SESSION_NONE) {
            session_start();
        }

        if (!isset($_SESSION['csrf_token'])) {
            $_SESSION['csrf_token'] = bin2hex(random_bytes(32));
        }
    }

    public function run() {
        try {
            $method = $_SERVER['REQUEST_METHOD'];
            $url = rtrim($_GET['url'] ?? '', '/');

            // Check CSRF token
            if ($method === 'POST') {
                if (!isset($_POST['csrf_token']) || $_POST['csrf_token'] !== $_SESSION['csrf_token']) {
                    header('HTTP/1.1 403 Forbidden');
                    echo 'Invalid CSRF token';
                    return;
                }
                $_SESSION['csrf_token'] = bin2hex(random_bytes(32));
            }

            // Route checking
            $foundRoute = false;
            $allowedMethods = [];

            foreach ($this->routes as $routeMethod => $routesByMethod) {
                foreach ($routesByMethod as $route => $handler) {
                    $pattern = preg_replace('/\{[^\/]+\}/', '([^\/]+)', $route);
                    $pattern = "#^" . rtrim($pattern, '/') . "$#";

                    if (preg_match($pattern, $url, $matches)) {
                        $allowedMethods[] = $routeMethod;

                        if ($method === $routeMethod) {
                            array_shift($matches); // remove full match
                            [$controller, $action] = $handler;

                            if (!class_exists($controller)) {
                                throw new Exception("Controller $controller not found");
                            }
                            if (!method_exists($controller, $action)) {
                                throw new Exception("Method $action not found in $controller");
                            }

                            $instance = new $controller();
                            call_user_func_array([$instance, $action], $matches);
                            return;
                        }
                        $foundRoute = true;
                    }
                }
            }

            if ($foundRoute) {
                header("HTTP/1.1 405 Method Not Allowed");
                echo "405 Method Not Allowed";
            } else {
                header("HTTP/1.1 404 Not Found");
                echo "404 Not Found";
            }

        } catch (Exception $e) {
            header("HTTP/1.1 500 Internal Server Error");
            echo "Error: " . htmlspecialchars($e->getMessage());

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

    public static function getCsrfToken() {
        return $_SESSION['csrf_token'] ?? '';
    }
}
