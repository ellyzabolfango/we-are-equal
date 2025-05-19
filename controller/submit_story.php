<?php
include('../includes/db.php');

// Check if connection failed; stop script and display error if true
if ($connection->connect_error) {
    die("Connection failed: " . $connection->connect_error);
}

// Retrieve and sanitize POST inputs
// Trim whitespace from 'name'; default to "Anonymous" if empty
$name = trim($_POST['name']) ?: "Anonymous";

// Convert 'age' input to integer value
$age = intval($_POST['age']);

// Trim whitespace from 'story' input
$story = trim($_POST['story']);

// Basic validation:
// - Age must be at least 13
// - Story must not be empty
if ($age < 13 || empty($story)) {
    die("Invalid input.");
}

// Prepare an SQL INSERT statement to add the new story to the 'stories' table
$statement = $connection->prepare("INSERT INTO stories (name, age, story) VALUES (?, ?, ?)");

// Bind parameters: "sis" means string (name), integer (age), string (story)
$statement->bind_param("sis", $name, $age, $story);

// Execute the prepared statement
if ($statement->execute()) {
    // On success, alert the user and redirect back to the homepage
    echo "<script>alert('Thank you! Your story has been submitted for review.'); window.location.href='../index.php';</script>";
} else {
    // If execution failed, display error message
    echo "Error: " . $statement->error;
}

// Close the prepared statement and database connection
$statement->close();
$connection->close();
?>