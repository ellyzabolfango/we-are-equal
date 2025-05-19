<?php
include('../includes/db.php');

// Check if the connection failed and stop the script with an error message if so
if ($connection->connect_error) {
    die("Connection failed: " . $connection->connect_error);
}

// Retrieve and sanitize user inputs from the POST request
// Trim removes whitespace from the beginning and end of the string
// If 'name' is empty, default to "Anonymous"
$name = trim($_POST['name']) ?: "Anonymous";

// Get 'email' and 'message' inputs and trim whitespace
$email = trim($_POST['email']);
$message = trim($_POST['message']);

// Basic validation: check if email or message are empty, stop execution with a message if true
if (empty($email) || empty($message)) {
    die("Please provide both an email and a message.");
}

// Prepare an SQL statement to insert the contact data into the 'contacts' table
$statement = $connection->prepare("INSERT INTO contacts (name, email, message) VALUES (?, ?, ?)");

// Bind parameters to the prepared statement
// "sss" means string (name), string (email), string (message)
$statement->bind_param("sss", $name, $email, $message);

// Execute the prepared statement
if ($statement->execute()) {
    // ✅ Send a confirmation email to the user
    $subject = "Thank You for Contacting We Are Equal!";
    $body = "Hi $name,\n\n"
          . "Thank you for reaching out to We Are Equal. Your message has been received:\n\n"
          . "\"$message\"\n\n"
          . "We appreciate your support and will get back to you as soon as we can.\n\n"
          . "With appreciation,\n"
          . "The We Are Equal Team";

    $headers = "From: no-reply@weareequal.org\r\n";
    $headers .= "Reply-To: no-reply@weareequal.org\r\n";
    $headers .= "X-Mailer: PHP/" . phpversion();

    mail($email, $subject, $body, $headers);

    echo "<script>alert('Thank you for your message! A confirmation email has been sent.'); window.location.href='../index.php';</script>";
} else {
    // If execution failed, output the error message
    echo "Error: " . $statement->error;
}

// Close the prepared statement to free resources
$statement->close();

// Close the database connection
$connection->close();
?>
