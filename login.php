<!-- ----------------------------------- -->
<!-- ACTION FOR LOGGING IN FUNCTIONALITY -->
<!-- ----------------------------------- -->

<?php
// Include database connection file
include('includes/db.php');

// Initialize error message variable
$error = '';

// Process form submission when method is POST
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Get and trim the username and password from POST data
    $username = trim($_POST['username']);
    $password = trim($_POST['password']);

    // Prepare SQL statement to safely fetch user data based on username
    $statement = $connection->prepare("SELECT id, password, role FROM users WHERE username = ?");
    $statement->bind_param("s", $username);
    $statement->execute();
    $result = $statement->get_result();

    // Check if exactly one user found
    if ($result->num_rows === 1) {
        $user = $result->fetch_assoc();

        // Verify submitted password against hashed password in database
        if (password_verify($password, $user['password'])) {
            // Store user info in session variables to maintain login state
            $_SESSION['user_id'] = $user['id'];
            $_SESSION['username'] = $username;
            $_SESSION['role'] = $user['role'];

            // Redirect admin users to admin page, others to story list page
            $redirect = $user['role'] === 'admin' ? 'admin.php' : 'story_list.php';
            header("Location: $redirect");
            exit(); // Stop further script execution after redirect
        }
    }

    // If login fails, set error message to display in the form
    $error = "Invalid username or password.";
}
?>


<!-- -------------------------------- -->
<!-- START OF HTML(UI) PART OF LOGIN. -->
<!-- -------------------------------- -->

<?php include('includes/header.php'); ?>
<!-- Include header with navbar, meta, styles -->

<div class="container py-5">
    <h2>Login</h2>

    <!-- Display error message if login failed -->
    <?php if (!empty($error)) : ?>
        <div class="alert alert-danger"><?= htmlspecialchars($error) ?></div>
    <?php endif; ?>

    <!-- Login form submits back to this same page (login.php) using POST -->
    <form action="login.php" method="POST">
        <input name="username" class="form-control mb-2" placeholder="Username" required>
        <input type="password" name="password" class="form-control mb-2" placeholder="Password" required>
        <button type="submit" class="btn btn-dark">Login</button>
    </form>

    <p class="mt-3">
        Don't have an account? <a href="register.php">Register</a>
    </p>
</div>

<?php include('includes/footer.php'); ?>
<!-- Include footer with closing tags and scripts -->
