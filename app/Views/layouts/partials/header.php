<?php
use App\Core\App;
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= $title ?? 'Arba Minch General Hospital' ?></title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="<?= APP_URL ?>/assets/css/style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
</head>
<body class="font-sans bg-gray-50">
    <!-- Top Bar -->
    <div class="bg-blue-900 text-white py-2 px-4">
        <div class="container mx-auto flex flex-col md:flex-row justify-between items-center">
            <div class="flex items-center space-x-2 mb-2 md:mb-0">
                <i class="fas fa-phone-alt"></i>
                <span>Emergency: (+251) 681-812-255</span>
            </div>
            <div class="flex space-x-4">
                <div class="flex items-center space-x-2">
                    <i class="far fa-clock"></i>
                    <span>24/7 Service</span>
                </div>
                <div class="flex items-center space-x-2">
                    <i class="fas fa-map-marker-alt"></i>
                    <span>Arba Minch, Ethiopia</span>
                </div>
            </div>
        </div>
    </div>

    <!-- Main Header -->
    <header class="bg-white shadow-md">
        <div class="container mx-auto px-4 py-4 flex flex-col md:flex-row justify-between items-center">
            <div class="flex items-center mb-4 md:mb-0">
                <img src="<?= APP_URL ?>/assets/images/Logo.png" alt="Hospital Logo" class="h-12 mr-3">
                <h1 class="text-2xl font-bold text-blue-900">ARBA-MINCH-GH</h1>
            </div>
            
            <nav class="flex flex-col md:flex-row items-center space-y-2 md:space-y-0 md:space-x-6">
                <?php if (!isset($_SESSION['user_id'])): ?>
                    <a href="<?= APP_URL ?>/home" class="nav-link">Home</a>
                    <a href="<?= APP_URL ?>/about" class="nav-link">About</a>
                    <a href="<?= APP_URL ?>/services" class="nav-link">Services</a>
                    <a href="<?= APP_URL ?>/doctors" class="nav-link">Doctors</a>
                    <a href="<?= APP_URL ?>/contact" class="nav-link">Contact</a>
                <?php endif; ?>
                
                <?php if (isset($_SESSION['user_id'])): ?>
                    <a href="<?= APP_URL ?>/dashboard/<?= strtolower($_SESSION['role']) ?>" 
                    class="bg-blue-600 text-white px-4 py-2 rounded-md ml-0 md:ml-4">
                        Dashboard
                    </a>
                <?php else: ?>
                    <a href="<?= APP_URL ?>/auth/login" 
                    class="bg-blue-600 text-white px-4 py-2 rounded-md ml-0 md:ml-4">
                        Login
                    </a>
                <?php endif; ?>
            </nav>
        </div>
    </header>
    <main class="min-h-screen">