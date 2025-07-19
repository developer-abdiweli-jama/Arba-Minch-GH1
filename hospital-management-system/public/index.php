<?php
// Enable error reporting for development
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

// Start session if not already started
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

// Generate CSRF token if not set
if (!isset($_SESSION['csrf_token'])) {
    $_SESSION['csrf_token'] = bin2hex(random_bytes(32));
}

// Load dependencies
require_once __DIR__ . '/../vendor/autoload.php';
require_once __DIR__ . '/../config/config.php';
require_once __DIR__ . '/../routes/web.php';

use App\Core\App;

try {
    $app = new App($routes);
    $app->run();
} catch (Exception $e) {
    header('HTTP/1.1 500 Internal Server Error');
    echo 'Error: ' . htmlspecialchars($e->getMessage());
}
?>