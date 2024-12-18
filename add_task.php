<?php
include 'db.php';

header("Content-Type: application/json");

$data = json_decode(file_get_contents("php://input"), true);
$title = $data['title'];

if (!empty($title)) {
    $conn->query("INSERT INTO tasks (title) VALUES ('$title')");
    echo json_encode(["message" => "Task added successfully"]);
} else {
    echo json_encode(["error" => "Title is required"]);
}
?>
