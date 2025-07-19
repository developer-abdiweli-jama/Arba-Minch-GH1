<?php
use App\Core\View;
?>

<section class="bg-gray-100 py-12">
    <div class="container mx-auto px-4">
        <h2 class="section-title">Audit Logs</h2>
        <div class="overflow-x-auto">
            <table class="min-w-full bg-white border rounded">
                <thead>
                    <tr>
                        <th class="py-2 px-4 border-b">ID</th>
                        <th class="py-2 px-4 border-b">User</th>
                        <th class="py-2 px-4 border-b">Action</th>
                        <th class="py-2 px-4 border-b">Details</th>
                        <th class="py-2 px-4 border-b">Timestamp</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($logs as $log): ?>
                        <tr>
                            <td class="py-2 px-4 border-b"><?php echo htmlspecialchars($log['id']); ?></td>
                            <td class="py-2 px-4 border-b"><?php echo htmlspecialchars($log['full_name'] ?? 'N/A'); ?></td>
                            <td class="py-2 px-4 border-b"><?php echo htmlspecialchars($log['action']); ?></td>
                            <td class="py-2 px-4 border-b"><?php echo htmlspecialchars($log['details'] ?? 'N/A'); ?></td>
                            <td class="py-2 px-4 border-b"><?php echo htmlspecialchars($log['created_at']); ?></td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>
</section>
?>