<?php
/**
 * Main Application Layout
 * 
 * Variables needed:
 * - $title: Page title
 * - $content: Main HTML content
 * Optional:
 * - $noHeader: bool to hide header
 * - $noFooter: bool to hide footer
 * - $showSidebar: bool to show sidebar
 * - $currentPage: string for active nav item
 * - $cssFiles: array of additional CSS files
 * - $jsFiles: array of additional JS files
 */
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= htmlspecialchars($title ?? 'ARBA-MINCH-GH Hospital') ?></title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <link rel="stylesheet" href="/assets/css/style.css">
    <?php if (!empty($cssFiles)): ?>
        <?php foreach ((array)$cssFiles as $file): ?>
            <link rel="stylesheet" href="/assets/css/<?= ltrim($file, '/') ?>.css">
        <?php endforeach; ?>
    <?php endif; ?>
</head>
<body class="<?= $bodyClass ?? 'default-layout' ?>">
    
    <?php if (empty($noHeader)): ?>
        <?php include __DIR__ . '/partials/header.php'; ?>
    <?php endif; ?>
    
    <?php if (!empty($showSidebar)): ?>
        <?php include __DIR__ . '/partials/sidebar.php'; ?>
    <?php endif; ?>
    
    <main class="main-content">
        <?= $content ?? '' ?>
    </main>
    
    <?php if (empty($noFooter)): ?>
        <?php include __DIR__ . '/partials/footer.php'; ?>
    <?php endif; ?>

    <script src="/assets/js/main.js"></script>
    <?php if (!empty($jsFiles)): ?>
        <?php foreach ((array)$jsFiles as $file): ?>
            <script src="/assets/js/<?= ltrim($file, '/') ?>.js"></script>
        <?php endforeach; ?>
    <?php endif; ?>
</body>
</html>