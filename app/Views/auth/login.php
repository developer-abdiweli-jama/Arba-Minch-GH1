<?php
use App\Core\View;
require_once __DIR__ . '/../layouts/header.php';
?>
<section class="bg-gray-100 py-12">
    <div class="container mx-auto px-4">
        <h2 class="text-3xl font-bold text-center mb-4">ARBA-MINCH-GH</h2>
        <p class="text-center mb-6">Welcome back! Please log in to continue.</p>
        <?php if (isset($error)): ?>
            <p class="text-red-500 text-center"><?php echo htmlspecialchars($error); ?></p>
        <?php endif; ?>
        <form method="POST" action="<?php echo APP_URL; ?>/auth/login" class="max-w-md mx-auto space-y-4">
            <input type="hidden" name="csrf_token" value="<?php echo $_SESSION['csrf_token']; ?>">
            <div>
                <label for="email" class="block text-sm font-medium">Email</label>
                <input type="email" name="email" id="email" class="w-full p-2 border rounded" required>
            </div>
            <div>
                <label for="password" class="block text-sm font-medium">Password</label>
                <input type="password" name="password" id="password" class="w-full p-2 border rounded" required>
            </div>
            <div>
                <label class="inline-flex items-center">
                    <input type="checkbox" name="remember" class="form-checkbox">
                    <span class="ml-2">Remember me</span>
                </label>
            </div>
            <button type="submit" class="w-full bg-blue-600 text-white p-2 rounded hover:bg-blue-700">Login</button>
        </form>
        <p class="text-center mt-4">Don't have an account? <a href="<?php echo APP_URL; ?>/auth/register" class="text-blue-600 hover:underline">Sign up</a>.</p>
    </div>
</section>
<?php require_once __DIR__ . '/../layouts/footer.php'; ?>