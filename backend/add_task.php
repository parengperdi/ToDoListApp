<?php
include 'db.php';

header("Content-Type: application/json");

// Decode JSON input
$data = json_decode(file_get_contents("php://input"), true);
$title = $data['title'] ?? null;

// Validate the title
if (!empty($title)) {
    // Use a prepared statement to prevent SQL injection
    $stmt = $conn->prepare("INSERT INTO tasks (title) VALUES (?)");
    $stmt->bind_param("s", $title);

    if ($stmt->execute()) {
        echo json_encode(["message" => "Task added successfully"]);
    } else {
        echo json_encode(["error" => "Failed to add task"]);
    }

    $stmt->close();
} else {
    echo json_encode(["error" => "Title is required"]);
}
?>
