<?php
session_start();
include '../../../conn.php';

header('Content-Type: application/json');

$dentist_name = $_SESSION['name'];

// Use prepared statements for security
$stmt = $conn->prepare("SELECT `name` FROM appointments WHERE assigned_doctor = ?");
$stmt->bind_param("s", $dentist_name);
$stmt->execute();
$result = $stmt->get_result();

$data = [];
while ($row = $result->fetch_assoc()) {
    $data[] = $row['name'];
}

echo json_encode($data);
?>
