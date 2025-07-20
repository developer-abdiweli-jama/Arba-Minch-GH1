<?php
// routes/web.php (REWRITTEN FOR STABILITY)

use App\Controllers\AuthController;
use App\Controllers\HomeController;
use App\Controllers\DashboardController;
use App\Controllers\AppointmentController;
use App\Controllers\DoctorController;
use App\Controllers\MedicalRecordController;
use App\Controllers\LogsController;
use App\Controllers\PatientController;

return [
    'GET' => [
        '' => [HomeController::class, 'index'],
        'home' => [HomeController::class, 'index'],
        'about' => [HomeController::class, 'about'],
        'services' => [HomeController::class, 'services'],
        'doctors' => [HomeController::class, 'doctors'],
        'contact' => [HomeController::class, 'contact'],

        'auth/login' => [AuthController::class, 'login'],
        'auth/register' => [AuthController::class, 'register'],
        'auth/logout' => [AuthController::class, 'logout'],
        'auth/unauthorized' => [AuthController::class, 'unauthorized'],

        'dashboard/admin' => [DashboardController::class, 'admin'],
        'dashboard/doctor' => [DashboardController::class, 'doctor'],
        'dashboard/patient' => [DashboardController::class, 'patient'],

        'appointments/book' => [AppointmentController::class, 'book'],
        'appointments/manage' => [AppointmentController::class, 'manage'],
        'appointments/history' => [AppointmentController::class, 'history'],
        'appointments/notifications' => [AppointmentController::class, 'notifications'],

        'medical_records/create/(\d+)' => [MedicalRecordController::class, 'create'],
        'medical_records/view/(\d+)' => [MedicalRecordController::class, 'view'],

        'doctors/index' => [DoctorController::class, 'index'],
        'doctors/create' => [DoctorController::class, 'create'],

        'logs/index' => [LogsController::class, 'index'],
        'patients/create' => [PatientController::class, 'create'],
    ],

    'POST' => [
        'auth/login' => [AuthController::class, 'login'],
        'auth/register' => [AuthController::class, 'register'],

        'appointments/book' => [AppointmentController::class, 'book'],
        'appointments/approve/(\d+)' => [AppointmentController::class, 'approve'],
        'appointments/reject/(\d+)' => [AppointmentController::class, 'reject'],

        'contact' => [HomeController::class, 'contact'],
        'medical_records/create' => [MedicalRecordController::class, 'create'],
        'doctors/create' => [DoctorController::class, 'create'],
        'patients/create' => [PatientController::class, 'create'],
    ]
];
