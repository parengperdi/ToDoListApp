<?php
include 'db.php';

header("Content-Type: application/json");

$result = $conn->query("SELECT * FROM tasks");
$tasks = array();

while ($row = $result->fetch_assoc()) {
    $tasks[] = $row;
}

echo json_encode($tasks);
?>
