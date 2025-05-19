<?php
// Start the session to access session variables
session_start();

// Remove all session variables
session_unset();

// Destroy the session completely
session_destroy();

// Redirect the user to the homepage (adjust the path if needed)
header("Location: ../index.php");
exit(); // Stop further script execution
