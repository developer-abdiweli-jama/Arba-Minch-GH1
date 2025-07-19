# Arba-Minch-GH1

Hospital Management System
A PHP-based web application for managing hospital operations, including user authentication, role-based access, appointments, medical records, notifications, and audit logs.
Requirements

PHP 7.4+
MySQL 5.7+
Composer
Apache/Nginx
SMTP server (e.g., Gmail)

Setup Instructions

Install Dependencies:
composer install


Configure Environment:

Copy .env.example to .env and update with your database and SMTP settings:DB_HOST=localhost
DB_NAME=hospital_db
DB_USER=root
DB_PASS=
APP_URL=http://localhost/hospital-management-system/public
SMTP_HOST=smtp.example.com
SMTP_USER=your-email@example.com
SMTP_PASS=your-password
SMTP_PORT=587




Set Up Database:

Create the database:mysql -u root -p -e "CREATE DATABASE hospital_db"


Import schema and seed data:mysql -u root -p hospital_db < database/schema.sql
mysql -u root -p hospital_db < database/seed.sql




Configure Web Server:

For Apache, add to httpd.conf:<VirtualHost *:80>
    DocumentRoot /path/to/hospital-management-system/public
    <Directory /path/to/hospital-management-system/public>
        AllowOverride All
        Require all granted
    </Directory>
</VirtualHost>


Create public/.htaccess:RewriteEngine On
RewriteBase /hospital-management-system/public/
RewriteCond %{REQUEST_FILENAME} !-f
RewriteCond %{REQUEST_FILENAME} !-d
RewriteRule ^(.*)$ index.php?url=$1 [QSA,L]




Set Permissions:
chmod 775 -R storage public/uploads


Run the Application:

Access http://localhost/hospital-management-system/public.
Default admin: admin@hospital.com / password.



Features

Core: Authentication, role-based access (admin, doctor, patient), appointment booking/management, dashboards, user management, security (password hashing, prepared statements).
Enhanced: Medical records, notifications (database + email via PHPMailer), appointment history, audit logs.

Directory Structure

public/: Web root (index.php, assets).
app/: MVC core (Core/, Controllers/, Models/, Views/).
routes/: URL routing (web.php).
config/: Configuration files (config.php, constants.php).
database/: Schema and seed data (schema.sql, seed.sql).
storage/: Logs and temporary files.
tests/: Unit tests.

Testing
Run unit tests with PHPUnit:
vendor/bin/phpunit tests/AppointmentTest.php

License
MIT License (see LICENSE file).

All Users had password and its (password123) 

'Admin User', 'admin@hospital.com', 'password123', 'admin'

'Dr. Afework Yohannes', 'afework@hospital.com', 'password123', 'doctor'

'Patient One', 'patient1@hospital.com', 'password123', 'patient'
