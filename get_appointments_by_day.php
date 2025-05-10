<?php
include 'conn.php'; // Include your database connection

// Get the current date
$today = date('Y-m-d');

// Prepare the query to fetch the number of appointments per day for the last 7 days
$query = "
    SELECT DATE(bookingDate) AS appointment_date, COUNT(*) AS total_appointments
    FROM appointments
    WHERE bookingDate >= DATE_SUB(CURDATE(), INTERVAL 7 DAY)
    GROUP BY DATE(bookingDate)
    ORDER BY DATE(bookingDate) ASC
";

$result = $conn->query($query);

// Prepare arrays for storing dates and appointment counts
$dates = [];
$appointments = [];

// Fetch data from the database
while ($row = $result->fetch_assoc()) {
    $dates[] = $row['appointment_date'];
    $appointments[] = $row['total_appointments'];
}

// Close the database connection
$conn->close();

// Return the data as JSON
echo json_encode([
    'dates' => $dates,
    'appointments' => $appointments
]);
?>
