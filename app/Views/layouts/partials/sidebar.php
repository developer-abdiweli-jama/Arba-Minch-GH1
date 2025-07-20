<aside class="fixed hidden md:block h-full w-64 bg-blue-900 text-white shadow-lg z-10">
    <div class="p-4 border-b border-blue-800">
        <div class="flex items-center space-x-3">
            <img src="<?= APP_URL ?>/assets/images/Logo.png" alt="Logo" class="h-10">
            <span class="font-bold">Admin Panel</span>
        </div>
    </div>
    
    <nav class="p-4">
        <ul class="nav-menu">
            <li class="nav-item <?= ($currentPage ?? '') === 'dashboard' ? 'active' : '' ?>">
                <a href="/dashboard" class="nav-link">
                    <i class="fas fa-tachometer-alt"></i>
                    <span>Dashboard</span>
                </a>
            </li>
            
            <li class="nav-item <?= ($currentPage ?? '') === 'patients' ? 'active' : '' ?>">
                <a href="/patients" class="nav-link">
                    <i class="fas fa-procedures"></i>
                    <span>Patients</span>
                </a>
            </li>
            
            <li class="nav-item <?= ($currentPage ?? '') === 'appointments' ? 'active' : '' ?>">
                <a href="/appointments" class="nav-link">
                    <i class="fas fa-calendar-check"></i>
                    <span>Appointments</span>
                </a>
            </li>
            
            <li class="nav-item <?= ($currentPage ?? '') === 'doctors' ? 'active' : '' ?>">
                <a href="/doctors" class="nav-link">
                    <i class="fas fa-user-md"></i>
                    <span>Doctors</span>
                </a>
            </li>
            
            <li class="nav-item <?= ($currentPage ?? '') === 'medical-records' ? 'active' : '' ?>">
                <a href="/medical-records" class="nav-link">
                    <i class="fas fa-file-medical"></i>
                    <span>Medical Records</span>
                </a>
            </li>
        </ul>
    </nav>
</aside>