-- Insert sample users
INSERT INTO users (full_name, email, password, role, created_at) VALUES
('Admin User', 'admin@hospital.com', '$2y$10$JW8ugSWTZSuN6ihc4onCpOuBhJekSY8/UzOMBNQm5lZ.N9wsmD3oO', 'admin', NOW()),
('Dr. Afework Yohannes', 'afework@hospital.com', '$2y$10$j9zVDg7rk5ub9G0/2xCLdevDztHzfHHEwvVoJABa4vQ7ZJB/rVfpe', 'doctor', NOW()),
('Patient One', 'patient1@hospital.com', '$2y$10$hpPDO.HX6mzartnlSHEMyOEn2trrP6X8cQ2PtgfpDYI0Ki.BhQ/3.', 'patient', NOW());

-- Insert sample doctors
INSERT INTO doctors (user_id, specialty, education, experience, phone, address, profile_picture, availability) VALUES
(2, 'Neurology', 'MD, PhD in Neurology', '15 years', '+251123456789', '123 Health St, Arba Minch', 'afework.jpg', '{"mon": "09:00-17:00", "tue": "09:00-17:00"}');

-- Insert sample patients
INSERT INTO patients (user_id, gender, date_of_birth, phone, address, emergency_contact, blood_type, medical_conditions) VALUES
(3, 'male', '1990-01-01', '+251987654321', '456 Wellness Rd, Arba Minch', 'John Doe (+251111222333)', 'O+', 'Hypertension');

-- Insert sample appointments
INSERT INTO appointments (patient_id, doctor_id, appointment_date, reason, status, created_at) VALUES
(1, 1, '2025-07-20 10:00:00', 'Routine Checkup', 'pending', NOW());

-- Insert sample medical records
INSERT INTO medical_records (patient_id, doctor_id, appointment_id, visit_date, diagnosis, prescription, test_results, notes, created_at) VALUES
(1, 1, 1, '2025-07-20 10:00:00', 'Mild headache', 'Ibuprofen 400mg', 'Normal blood test', 'Follow-up in 2 weeks', NOW());

-- Insert sample notifications
INSERT INTO notifications (user_id, message, type, status, created_at) VALUES
(3, 'Your appointment on 2025-07-20 has been requested.', 'appointment', 'unread', NOW());

-- Insert sample audit logs
INSERT INTO audit_logs (user_id, action, details, created_at) VALUES
(1, 'login', 'User 1 logged in', NOW());