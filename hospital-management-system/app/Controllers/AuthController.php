<?php
namespace App\Controllers;
use App\Core\Controller;
use App\Core\AuthMiddleware;
use App\Core\View;
use App\Models\User;
use App\Models\Patient;
use App\Models\Doctor;
use App\Models\AuditLog;

class AuthController extends Controller {
    public function login() {
        session_start();
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            return $this->handleLogin();
        }
        if (isset($_COOKIE['remember_token'])) {
            $user = new User();
            $result = $user->findByRememberToken($_COOKIE['remember_token']);
            if ($result) {
                $_SESSION['user_id'] = $result['id'];
                $_SESSION['role'] = $result['role'];
                $this->redirect('dashboard/' . $result['role']);
            }
        }
        View::render('auth/login', ['title' => 'Login']);
    }

    private function handleLogin() {
        session_start();
        if (!isset($_POST['csrf_token']) || $_POST['csrf_token'] !== $_SESSION['csrf_token']) {
            View::render('auth/login', ['title' => 'Login', 'error' => 'Invalid CSRF token']);
            return;
        }
        $email = $_POST['email'] ?? '';
        $password = $_POST['password'] ?? '';
        $user = new User();
        $result = $user->findByEmail($email);
        if ($result && password_verify($password, $result['password'])) {
            $_SESSION['user_id'] = $result['id'];
            $_SESSION['role'] = $result['role'];
            if (isset($_POST['remember']) && $_POST['remember'] === 'on') {
                $token = bin2hex(random_bytes(16));
                setcookie('remember_token', $token, time() + 30*24*60*60, '/', '', false, true);
                $user->updateRememberToken($result['id'], $token);
            }
            $auditLog = new AuditLog();
            $auditLog->create([
                'user_id' => $result['id'],
                'action' => 'login',
                'details' => "User {$result['id']} logged in"
            ]);
            $this->redirect('dashboard/' . $result['role']);
        } else {
            View::render('auth/login', ['title' => 'Login', 'error' => 'Invalid credentials']);
        }
    }

    public function register() {
        session_start();
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            return $this->handleRegister();
        }
        View::render('auth/register', ['title' => 'Register']);
    }

    private function handleRegister() {
        session_start();
        if (!isset($_POST['csrf_token']) || $_POST['csrf_token'] !== $_SESSION['csrf_token']) {
            View::render('auth/register', ['title' => 'Register', 'error' => 'Invalid CSRF token']);
            return;
        }
        $full_name = $_POST['full_name'] ?? '';
        $email = $_POST['email'] ?? '';
        $password = $_POST['password'] ?? '';
        $confirm_password = $_POST['confirm_password'] ?? '';
        $role = $_POST['role'] ?? '';
        if ($password !== $confirm_password) {
            View::render('auth/register', ['title' => 'Register', 'error' => 'Passwords do not match']);
            return;
        }
        if (strlen($password) < 8) {
            View::render('auth/register', ['title' => 'Register', 'error' => 'Password must be at least 8 characters']);
            return;
        }
        $user = new User();
        $hashed_password = password_hash($password, PASSWORD_BCRYPT);
        $user_id = $user->create([
            'full_name' => $full_name,
            'email' => $email,
            'password' => $hashed_password,
            'role' => $role
        ]);
        if ($user_id) {
            if ($role === 'patient') {
                $patient = new Patient();
                $patient->create([
                    'user_id' => $user_id,
                    'gender' => $_POST['gender'] ?? '',
                    'date_of_birth' => $_POST['date_of_birth'] ?? null,
                    'phone' => $_POST['phone'] ?? '',
                    'address' => $_POST['address'] ?? '',
                    'emergency_contact' => $_POST['emergency_contact'] ?? '',
                    'blood_type' => $_POST['blood_type'] ?? '',
                    'medical_conditions' => $_POST['medical_conditions'] ?? ''
                ]);
            } elseif ($role === 'doctor') {
                $doctor = new Doctor();
                $doctor->create([
                    'user_id' => $user_id,
                    'specialty' => $_POST['specialty'] ?? '',
                    'education' => $_POST['education'] ?? '',
                    'experience' => $_POST['experience'] ?? '',
                    'phone' => $_POST['phone'] ?? '',
                    'address' => $_POST['address'] ?? '',
                    'profile_picture' => $_FILES['profile_picture']['name'] ?? null,
                    'availability' => $_POST['availability'] ?? ''
                ]);
            }
            $auditLog = new AuditLog();
            $auditLog->create([
                'user_id' => $user_id,
                'action' => 'register',
                'details' => "User {$user_id} registered as {$role}"
            ]);
            $this->redirect('auth/login');
        } else {
            View::render('auth/register', ['title' => 'Register', 'error' => 'Registration failed']);
        }
    }

    public function logout() {
        session_start();
        $user_id = $_SESSION['user_id'] ?? null;
        session_destroy();
        setcookie('remember_token', '', time() - 3600, '/');
        if ($user_id) {
            $auditLog = new AuditLog();
            $auditLog->create([
                'user_id' => $user_id,
                'action' => 'logout',
                'details' => "User {$user_id} logged out"
            ]);
        }
        $this->redirect('auth/login');
    }

    public function unauthorized() {
        View::render('auth/unauthorized', ['title' => 'Unauthorized']);
    }
}
?>