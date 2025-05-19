<!-- ----------------------------------- -->
<!-- ACTION FOR REGISTER FUNCTIONALITY -->
<!-- ----------------------------------- -->

<?php
// Include database connection
include('includes/db.php');

// Initialize error message variable
$error = '';

// Process form submission when method is POST
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Get and trim username and password from POST data
    $username = trim($_POST['username']);
    $password = trim($_POST['password']);

    // Hash the password securely using bcrypt
    $hashed = password_hash($password, PASSWORD_BCRYPT);

    // Prepare SQL to insert new user, using prepared statements to prevent SQL injection
    $statement = $connection->prepare("INSERT INTO `users` (username, password) VALUES (?, ?)");
    $statement->bind_param("ss", $username, $hashed);

    // Execute the statement and check for success
    if ($statement->execute()) {
        // On success, alert user and redirect to login page
        echo "<script>alert('Registration successful! You can now log in.'); window.location.href='login.php';</script>";
        exit(); // Stop further script execution after redirect
    } else {
        // On failure (e.g., duplicate username), set error message to display
        $error = "Username already exists.";
    }
}
?>

<!-- -------------------------------- -->
<!-- START OF HTML(UI) PART OF REGISTER. -->
<!-- -------------------------------- -->

<?php include('includes/header.php'); ?>
<!-- Include header with navbar, meta, styles -->

<div class="container py-5">
    <h2>Register</h2>

    <!-- Show error alert if registration failed -->
    <?php if (!empty($error)) : ?>
        <div class="alert alert-danger"><?= htmlspecialchars($error) ?></div>
    <?php endif; ?>

    <!-- Registration form submits back to this same page (register.php) -->
    <form action="register.php" method="POST">
        <input name="username" class="form-control mb-2" placeholder="Username" required>
        <input type="password" name="password" class="form-control mb-2" placeholder="Password" required>
        <button type="submit" class="btn btn-primary">Register</button>
    </form>

    <p class="mt-3">Already have an account? <a href="login.php">Login</a></p>
</div>

<?php include('includes/footer.php'); ?>
<!-- Include footer with closing tags and scripts -->
