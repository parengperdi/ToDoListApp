<?php
include 'db.php';

header("Content-Type: application/json");

// Decode JSON input
$data = json_decode(file_get_contents("php://input"), true);
$id = $data['id'] ?? null;

// Validate the ID
if (!empty($id)) {
    $stmt = $conn->prepare("DELETE FROM tasks WHERE id = ?");
    $stmt->bind_param("i", $id);

    if ($stmt->execute()) {
        echo json_encode(["message" => "Task deleted successfully"]);
    } else {
        echo json_encode(["error" => "Failed to delete task"]);
    }

    $stmt->close();
} else {
    echo json_encode(["error" => "Task ID is required"]);
}
?>
