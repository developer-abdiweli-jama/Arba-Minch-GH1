<?php
use App\Core\View;
use App\Models\Notification;

$notificationModel = new Notification();
$notifications = $notificationModel->findByUser($_SESSION['user_id']);
?>

<section class="bg-gray-100 py-12">
    <div class="container mx-auto px-4">
        <h2 class="section-title">Notifications</h2>
        <div class="grid grid-cols-1 gap-6">
            <?php foreach ($notifications as $notification): ?>
                <div class="service-card p-6">
                    <p><strong><?php echo htmlspecialchars($notification['type']); ?>:</strong> <?php echo htmlspecialchars($notification['message']); ?></p>
                    <p><strong>Status:</strong> <?php echo $notification['status']; ?></p>
                    <p><strong>Date:</strong> <?php echo $notification['created_at']; ?></p>
                </div>
            <?php endforeach; ?>
        </div>
    </div>
</section>
?>