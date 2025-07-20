<?php
namespace App\Controllers;

use App\Core\Controller;
use App\Core\View;
use App\Models\User;

class AuthController extends Controller {
    public function showLoginForm() {
        if (isset($_SESSION['user_id'])) {
            $this->redirect('dashboard/' . $_SESSION['role']);
        }
        View::render('auth/login');
    }

    public function login() {
        $this->validateCsrfToken();

        $email = $_POST['email'] ?? '';
        $password = $_POST['password'] ?? '';

        $userModel = new User();
        $user = $userModel->findByEmail($email);

        if ($user && password_verify($password, $user['password'])) {
            $_SESSION['user_id'] = $user['id'];
            $_SESSION['role'] = $user['role'];
            $_SESSION['full_name'] = $user['full_name'];
            
            $this->redirect('dashboard/' . $user['role']);
        } else {
            View::render('auth/login', ['error' => 'Invalid email or password']);
        }
    }

    public function showRegisterForm() {
        View::render('auth/register');
    }

    public function register() {
        $this->validateCsrfToken();

        $data = [
            'full_name' => trim($_POST['full_name']),
            'email' => trim($_POST['email']),
            'password' => password_hash($_POST['password'], PASSWORD_BCRYPT),
            'role' => 'patient' // Default role
        ];

        $userModel = new User();
        if ($userModel->findByEmail($data['email'])) {
            View::render('auth/register', ['error' => 'Email already exists']);
            return;
        }

        $userId = $userModel->create($data);
        
        // Also create patient record if needed
        if ($userId && $data['role'] === 'patient') {
            $patientModel = new \App\Models\Patient();
            $patientModel->create([
                'user_id' => $userId,
                'phone' => $_POST['phone'] ?? null,
                'address' => $_POST['address'] ?? null
            ]);
        }

        $_SESSION['user_id'] = $userId;
        $_SESSION['role'] = $data['role'];
        $_SESSION['full_name'] = $data['full_name'];
        
        $this->redirect('dashboard/' . $data['role']);
    }

    public function logout() {
        session_destroy();
        $this->redirect('auth/login');
    }

    public function unauthorized() {
        View::render('auth/unauthorized');
    }
}