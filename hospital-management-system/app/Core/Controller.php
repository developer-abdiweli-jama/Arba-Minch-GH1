<?php
namespace App\Core;

class Controller {
    protected function view($view, $data = []) {
        require_once __DIR__ . '/../Views/' . $view . '.php';
    }

    protected function redirect($url) {
        header("Location: " . APP_URL . '/' . $url);
        exit;
    }
}
?>