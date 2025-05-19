<?php
// Database connection configuration
$host = "localhost";     // The database server (usually localhost for local development)
$user = "root";          // The MySQL username (default is 'root' in many local setups like XAMPP)
$pass = "";              // The MySQL password (empty by default in XAMPP; set it in production!)
$dbname = "we_are_equal_db"; // The name of the database you're connecting to

// Create a new MySQLi connection object
$connection = new mysqli($host, $user, $pass, $dbname);

// Check if the connection failed and display an error message
if ($connection->connect_error) {
    die("Connection failed: " . $connection->connect_error);
}

// db.php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
?>
