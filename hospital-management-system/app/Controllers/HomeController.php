<?php
namespace App\Controllers;

use App\Core\Controller;
use App\Core\View;

class HomeController extends Controller {
    public function index() {
        View::render('pages/home');
    }

    public function about() {
        View::render('pages/about');
    }

    public function services() {
        View::render('pages/services');
    }

    public function doctors() {
        View::render('pages/doctors');
    }

    public function contact() {
        View::render('pages/contact');
    }
}
?>