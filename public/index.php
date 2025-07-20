<?php
// Enable error reporting for development
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

// Define base path
define('BASE_PATH', dirname(__DIR__)); // This points to the project root

// Load dependencies
require_once BASE_PATH . '/vendor/autoload.php';
require_once BASE_PATH . '/config/config.php';

use App\Core\App;

try {
    $app = new App();
    $app->run();
} catch (Exception $e) {
    header('HTTP/1.1 500 Internal Server Error');
    echo 'Error: ' . htmlspecialchars($e->getMessage());
}