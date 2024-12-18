<?php
include 'db.php';

header("Content-Type: application/json");

$data = json_decode(file_get_contents("php://input"), true);

$id = $data['id'];

$conn->query("DELETE FROM tasks WHERE id = $id");

echo json_encode(["message" => "Task deleted successfully"]);
?>
