<?php
// Application configuration
define('APP_URL', 'http://localhost/hospital-management-system/public');
define('APP_NAME', 'Arba Minch General Hospital');

// Database configuration
define('DB_HOST', 'localhost');
define('DB_NAME', 'hospital_db');
define('DB_USER', 'root');
define('DB_PASS', '');

// Timezone
date_default_timezone_set('Africa/Addis_Ababa');

// Ensure errors are shown when DEBUG is true
define('DEBUG', true);
if (DEBUG) {
    ini_set('display_errors', 1);
    ini_set('display_startup_errors', 1);
    error_reporting(E_ALL);
} else {
    ini_set('display_errors', 0);
    ini_set('display_startup_errors', 0);
    error_reporting(0);
}