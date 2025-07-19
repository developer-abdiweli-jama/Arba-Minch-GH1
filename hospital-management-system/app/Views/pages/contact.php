<?php
use App\Core\View;

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $full_name = filter_input(INPUT_POST, 'full_name', FILTER_SANITIZE_STRING);
    $email = filter_input(INPUT_POST, 'email', FILTER_SANITIZE_EMAIL);
    $message = filter_input(INPUT_POST, 'message', FILTER_SANITIZE_STRING);

    // Basic server-side validation
    $errors = [];
    if (empty($full_name)) $errors[] = "Full name is required";
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) $errors[] = "Invalid email format";
    if (empty($message)) $errors[] = "Message is required";

    if (empty($errors)) {
        // Save to database (placeholder)
        $pdo = new PDO("mysql:host=" . DB_HOST . ";dbname=" . DB_NAME, DB_USER, DB_PASS);
        $stmt = $pdo->prepare("INSERT INTO contacts (full_name, email, message, created_at) VALUES (?, ?, ?, NOW())");
        $stmt->execute([$full_name, $email, $message]);
        $success = "Message sent successfully!";
    }
}
?>
<?php require_once __DIR__ . '/../layouts/header.php'; ?>
<section class="bg-contact_images relative py-12">
    <div class="hero-overlay2"></div>
    <div class="container1 mx-auto px-4 text-white text-center">
        <h2 class="section-title text-white">Contact Us</h2>
        <p class="mb-6">We’re here to help. Reach out to us for any inquiries or appointments.</p>
    </div>
</section>

<section class="py-12">
    <div class="container mx-auto px-4">
        <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
            <div>
                <h3 class="text-xl font-bold mb-4">Send Us a Message</h3>
                <?php if (isset($errors) && !empty($errors)): ?>
                    <div class="text-red-500 mb-4">
                        <?php foreach ($errors as $error): ?>
                            <p><?php echo $error; ?></p>
                        <?php endforeach; ?>
                    </div>
                <?php endif; ?>
                <?php if (isset($success)): ?>
                    <p class="text-green-500 mb-4"><?php echo $success; ?></p>
                <?php endif; ?>
                <form method="POST" action="<?php echo APP_URL; ?>/contact" class="space-y-4">
                    <input type="hidden" name="csrf_token" value="<?php echo $_SESSION['csrf_token']; ?>">
                    <div>
                        <label for="full_name" class="block text-sm font-medium">Full Name</label>
                        <input type="text" name="full_name" id="full_name" class="w-full p-2 border rounded" required>
                    </div>
                    <div>
                        <label for="email" class="block text-sm font-medium">Email</label>
                        <input type="email" name="email" id="email" class="w-full p-2 border rounded" required>
                    </div>
                    <div>
                        <label for="message" class="block text-sm font-medium">Message</label>
                        <textarea name="message" id="message" class="w-full p-2 border rounded" rows="5" required></textarea>
                    </div>
                    <button type="submit" class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700">Send Message</button>
                </form>
            </div>
            <div>
                <h3 class="text-xl font-bold mb-4">Our Location</h3>
                <p>Arba Minch General Hospital</p>
                <p>123 Health Street</p>
                <p>Arba Minch, Ethiopia</p>
                <div class="mt-4">
                    <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3153.086!2d37.557!3d6.033!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0x0!2zNsKwMDInNTguOCJTIDM3wrAzMycyNS4yIkU!5e0!3m2!1sen!2set!4v1634567890123" width="100%" height="300" style="border:0;" allowfullscreen="" loading="lazy"></iframe>
                </div>
            </div>
        </div>
    </div>
</section>
<?php require_once __DIR__ . '/../layouts/footer.php'; ?>