<?php
include 'db.php';

header("Content-Type: application/json");

// Decode JSON input
$data = json_decode(file_get_contents("php://input"), true);
$id = $data['id'] ?? null;
$completed = $data['completed'] ?? null;

// Validate inputs
if (!empty($id) && isset($completed)) {
    $stmt = $conn->prepare("UPDATE tasks SET completed = ? WHERE id = ?");
    $stmt->bind_param("ii", $completed, $id);

    if ($stmt->execute()) {
        echo json_encode(["message" => "Task updated successfully"]);
    } else {
        echo json_encode(["error" => "Failed to update task"]);
    }

    $stmt->close();
} else {
    echo json_encode(["error" => "Task ID and completed status are required"]);
}
?>
