<?php
namespace App\Controllers;

use App\Core\Controller;
use App\Core\AuthMiddleware;
use App\Core\View;
use App\Models\AuditLog;

class LogsController extends Controller {
    public function index() {
        AuthMiddleware::check('admin');
        $auditLog = new AuditLog();
        $logs = $auditLog->findAll();
        View::render('logs/index', ['logs' => $logs]);
    }
}
?>