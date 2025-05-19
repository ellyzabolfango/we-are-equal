<?php
include('includes/db.php');
include('includes/auth.php');
ifNotAdmin();
session_start();
?>

<?php include('includes/header.php'); ?>
<div class="container py-5">
    <h2>Admin Dashboard</h2>

    <?php if (isset($_SESSION['alert'])): ?>
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            <?= htmlspecialchars($_SESSION['alert']) ?>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
        <?php unset($_SESSION['alert']); ?>
    <?php endif; ?>

    <p>🔗 Access <strong><a href="http://localhost/phpmyadmin" target="_blank">database (phpMyAdmin)</a></strong> to
        manage the database directly.</p>

    <hr>
    <h4>📜 Submitted Stories</h4>
    <?php
    $query = "SELECT * FROM stories ORDER BY created_at DESC";
    $result = $connection->query($query);
    ?>

    <table class="table table-bordered mt-3">
        <thead>
            <tr>
                <th>Name</th>
                <th>Age</th>
                <th>Story</th>
                <th>Status</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            <?php while ($story = $result->fetch_assoc()): ?>
                <tr>
                    <td><?= htmlspecialchars($story['name']) ?></td>
                    <td><?= htmlspecialchars($story['age']) ?></td>
                    <td><?= nl2br(htmlspecialchars($story['story'])) ?></td>
                    <td>
                        <?= $story['is_approved'] == 1 ? '<span class="badge bg-success">Active</span>' : '<span class="badge bg-secondary">Inactive</span>' ?>
                    </td>
                    <td>
                        <?php if ($story['is_approved'] == 1): ?>
                            <a href="controller/story_approve.php?id=<?= $story['id'] ?>&is_approved=0"
                               class="btn btn-sm btn-warning"
                               onclick="return confirm('Are you sure you want to set this story as Inactive?')">
                               Set Inactive
                            </a>
                        <?php else: ?>
                            <a href="controller/story_approve.php?id=<?= $story['id'] ?>&is_approved=1"
                               class="btn btn-sm btn-success"
                               onclick="return confirm('Are you sure you want to activate this story?')">
                               Set Active
                            </a>
                        <?php endif; ?>
                        <a href="controller/story_delete.php?id=<?= $story['id'] ?>"
                           class="btn btn-sm btn-danger"
                           onclick="return confirm('Are you sure you want to delete this story?')">
                           Delete
                        </a>
                    </td>
                </tr>
            <?php endwhile; ?>
        </tbody>
    </table>

    <hr>
    <h4>👥 Manage Users</h4>
    <?php
    $users = $connection->query("SELECT id, username, role, created_at FROM users");
    ?>
    <table class="table table-sm">
        <thead>
            <tr>
                <th>ID</th>
                <th>Username</th>
                <th>Role</th>
                <th>Joined</th>
            </tr>
        </thead>
        <tbody>
            <?php while ($user = $users->fetch_assoc()): ?>
                <tr>
                    <td><?= $user['id'] ?></td>
                    <td><?= htmlspecialchars($user['username']) ?></td>
                    <td><?= htmlspecialchars($user['role']) ?></td>
                    <td><?= $user['created_at'] ?></td>
                </tr>
            <?php endwhile; ?>
        </tbody>
    </table>

    <hr>
    <h4>📬 Contact Form Submissions</h4>
    <?php
    $contacts = $connection->query("SELECT * FROM contacts ORDER BY submitted_at DESC");
    ?>
    <table class="table table-sm">
        <thead>
            <tr>
                <th>Name</th>
                <th>Email</th>
                <th>Message</th>
                <th>Date</th>
            </tr>
        </thead>
        <tbody>
            <?php while ($contact = $contacts->fetch_assoc()): ?>
                <tr>
                    <td><?= htmlspecialchars($contact['name']) ?></td>
                    <td><?= htmlspecialchars($contact['email']) ?></td>
                    <td><?= nl2br(htmlspecialchars($contact['message'])) ?></td>
                    <td><?= $contact['submitted_at'] ?></td>
                </tr>
            <?php endwhile; ?>
        </tbody>
    </table>
</div>

<?php include('includes/footer.php'); ?>
