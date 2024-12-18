<?php
// Enable error reporting for debugging
error_reporting(E_ALL);
ini_set('display_errors', 1);

// Database credentials
$host = "localhost";
$user = "root";
$password = "12345";       // Replace with your MySQL password
$database = "todo_list";
$port = 3307;              // MySQL port for XAMPP

// Establish the connection
$conn = new mysqli($host, $user, $password, $database, $port);

// Check for connection errors
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Optional: Uncomment for testing connection
// echo "Connected successfully";
?>
