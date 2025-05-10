<?php
// Start session if needed
session_start();

// Include your database connection file (conn.php)
include '../../../conn.php';

// Check if form is submitted via POST
if ($_SERVER['REQUEST_METHOD'] == "POST") {
    // Collect the form data from POST
    $day = $_POST['day'];
    $startTime = $_POST['startTime'];
    $endTime = $_POST['endTime'];

    // Prepare an SQL query to insert the data into the appointments table
    $sql = "INSERT INTO schedule (day, startTime, endTime) VALUES (?, ?, ?)";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("sss", $day, $startTime, $endTime);

    // Execute the query
    if ($stmt->execute()) {
        $_SESSION['success'] = "Schedule added successfully.";
        header("Location: /dental-appointment-system/pages/admin/schedule.php");
    } else {
        $_SESSION['error'] = "Schedule addition error. Please try again.";
        header("Location: /dental-appointment-system/pages/admin/schedule.php");
    }
    // Close the prepared statement
    $stmt->close();
}
// Close the database connection
$conn->close();
?>