<?php
// Load environment variables
$dotenv = parse_ini_file(__DIR__ . '/../.env', true);

// Database configuration
define('DB_HOST', $dotenv['DB_HOST'] ?? 'localhost');
define('DB_NAME', $dotenv['DB_NAME'] ?? 'hospital_db');
define('DB_USER', $dotenv['DB_USER'] ?? 'root');
define('DB_PASS', $dotenv['DB_PASS'] ?? '');

// Application configuration
define('APP_URL', $dotenv['APP_URL'] ?? 'http://localhost/hospital-management-system/public');
define('APP_NAME', $dotenv['APP_NAME'] ?? 'Arba Minch General Hospital');

// SMTP configuration for PHPMailer (placeholders, update for production)
define('SMTP_HOST', $dotenv['SMTP_HOST'] ?? 'smtp.example.com');
define('SMTP_USER', $dotenv['SMTP_USER'] ?? 'your-email@example.com');
define('SMTP_PASS', $dotenv['SMTP_PASS'] ?? 'your-password');
define('SMTP_PORT', $dotenv['SMTP_PORT'] ?? 587);
define('SMTP_FROM_EMAIL', $dotenv['SMTP_FROM_EMAIL'] ?? 'no-reply@hospital.com');
define('SMTP_FROM_NAME', $dotenv['SMTP_FROM_NAME'] ?? 'Arba Minch General Hospital');
?>