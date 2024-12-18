<?php
include 'db.php';

header("Content-Type: application/json");

$data = json_decode(file_get_contents("php://input"), true);

$id = $data['id'];
$completed = $data['completed'];

$conn->query("UPDATE tasks SET completed = $completed WHERE id = $id");

echo json_encode(["message" => "Task updated successfully"]);
?>
