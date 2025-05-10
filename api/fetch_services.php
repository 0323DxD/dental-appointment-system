<?php
require_once '../conn.php';

$query = "SELECT service, price FROM services";
$result = $conn->query($query);

$data = [];
while ($row = $result->fetch_assoc()) {
    $data[] = $row;
}

echo json_encode($data); // Convert data to JSON format
?>