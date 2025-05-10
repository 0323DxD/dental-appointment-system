<?php
session_start();
include '../../../conn.php';

header('Content-Type: application/json');

$role = 'Dentist';
// Use prepared statements for security
$stmt = $conn->prepare("SELECT `name` FROM users WHERE role = ?");
$stmt->bind_param("s", $role);
$stmt->execute();
$result = $stmt->get_result();

$data = [];
while ($row = $result->fetch_assoc()) {
    $data[] = $row['name'];
}

echo json_encode($data);
?>
