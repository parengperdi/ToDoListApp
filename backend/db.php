<?php
$host = "localhost";
$user = "root";           // Default MySQL user
$password = "";           // Default password (empty in XAMPP)
$database = "todo_list";

$conn = new mysqli($host, $user, $password, $database);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
?>
