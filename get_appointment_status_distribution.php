<?php
include 'conn.php'; // Include your database connection

// Query to get the count of each appointment status
$query = "
    SELECT status, COUNT(*) AS total
    FROM appointments
    GROUP BY status
";

$result = $conn->query($query);

// Prepare arrays for storing status and count data
$statuses = [];
$counts = [];

// Fetch data from the database
while ($row = $result->fetch_assoc()) {
    $statuses[] = $row['status'];
    $counts[] = $row['total'];
}

// Close the database connection
$conn->close();

// Return the data as JSON
echo json_encode([
    'statuses' => $statuses,
    'counts' => $counts
]);
?>
