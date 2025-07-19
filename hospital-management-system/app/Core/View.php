<?php
namespace App\Core;

class View {
    public static function render($view, $data = []) {
        extract($data);
        require_once __DIR__ . '/../Views/layouts/header.php';
        require_once __DIR__ . '/../Views/' . $view . '.php';
        require_once __DIR__ . '/../Views/layouts/footer.php';
    }
}
?>