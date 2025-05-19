<?php
// Check if the user is logged in. Returns true if 'user_id' exists in session, false otherwise.
function isLoggedIn() {
    // If 'user_id' is saved in session, user is logged in.
    return isset($_SESSION['user_id']);
}

// Check if the logged in user is an admin.
function isAdmin() {
    // Returns true if 'role' is set to 'admin' in session, false otherwise.
    return (isset($_SESSION['role']) && $_SESSION['role'] === 'admin');
}

// Redirect to login page if the user is not logged in.
function requireLogin() {
    if (!isLoggedIn()) {
        echo ("Login required.");
        // Redirect to login page if user is not authenticated.
        header("Location: login.php");
        // Stop further script execution
        exit();
    }
}

// Redirect to login page if the user is not an admin.
function ifNotAdmin() {
    if (!isAdmin()) {
        // Redirect to login page if user is not an admin
        header("Location: login.php");
        // Stop further script execution
        exit();
    }
}
?>