<?php
namespace App\Controllers;

use App\Core\Controller;
use App\Core\AuthMiddleware;
use App\Core\View;

class DashboardController extends Controller {
    public function admin() {
        AuthMiddleware::check('admin');
        View::render('dashboard/admin', ['title' => 'Admin Dashboard']);
    }

    public function doctor() {
        AuthMiddleware::check('doctor');
        View::render('dashboard/doctor', ['title' => 'Doctor Dashboard']);
    }

    public function patient() {
        AuthMiddleware::check('patient');
        View::render('dashboard/patient', ['title' => 'Patient Dashboard']);
    }
}
?>