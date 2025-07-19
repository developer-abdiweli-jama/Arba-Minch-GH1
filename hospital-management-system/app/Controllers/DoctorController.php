<?php
namespace App\Controllers;

use App\Core\Controller;
use App\Core\AuthMiddleware;
use App\Core\View;
use App\Models\Doctor;
use App\Models\User;

class DoctorController extends Controller {
    public function index() {
        AuthMiddleware::check('admin');
        $doctor = new Doctor();
        $doctors = $doctor->findAll();
        View::render('doctors/index', ['doctors' => $doctors]);
    }

    public function create() {
        AuthMiddleware::check('admin');
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $user = new User();
            $hashed_password = password_hash($_POST['password'], PASSWORD_BCRYPT);
            $user_id = $user->create([
                'full_name' => $_POST['full_name'],
                'email' => $_POST['email'],
                'password' => $hashed_password,
                'role' => 'doctor'
            ]);

            // Handle profile picture upload
            $profilePictureName = null;
            if (isset($_FILES['profile_picture']) && $_FILES['profile_picture']['error'] === UPLOAD_ERR_OK) {
                $uploadDir = __DIR__ . '/../../public/uploads/';
                if (!is_dir($uploadDir)) {
                    mkdir($uploadDir, 0755, true);
                }
                $profilePictureName = uniqid('doctor_') . '_' . basename($_FILES['profile_picture']['name']);
                $uploadFile = $uploadDir . $profilePictureName;
                move_uploaded_file($_FILES['profile_picture']['tmp_name'], $uploadFile);
            }

            $doctor = new Doctor();
            $doctor->create([
                'user_id' => $user_id,
                'specialty' => $_POST['specialty'],
                'education' => $_POST['education'],
                'experience' => $_POST['experience'],
                'phone' => $_POST['phone'],
                'address' => $_POST['address'],
                'profile_picture' => $profilePictureName,
                'availability' => $_POST['availability']
            ]);

            $this->redirect('doctors/index');
        } else {
            View::render('doctors/create');
        }
    }

    public function list() {
        $doctorModel = new \App\Models\Doctor();
        $doctors = $doctorModel->findAllWithUserInfo();
        \App\Core\View::render('pages/doctors', ['doctors' => $doctors]);
    }
}
?>