<?php
include 'db.php';

header("Content-Type: application/json");

$result = $conn->query("SELECT * FROM tasks");
$tasks = [];

// Fetch all tasks and store them in an array
while ($row = $result->fetch_assoc()) {
    $tasks[] = $row;
}

// Return the tasks as JSON
echo json_encode($tasks);
?>
