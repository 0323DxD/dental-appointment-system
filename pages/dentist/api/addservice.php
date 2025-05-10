<?php
// Start session if needed
session_start();

// Include your database connection file (conn.php)
include '../../../conn.php';

// Check if form is submitted via POST
if ($_SERVER['REQUEST_METHOD'] == "POST") {
    // Collect the form data from POST
    $service = $_POST['service'];
    $description = $_POST['description'];
    $price = $_POST['price'];

    // Prepare an SQL query to insert the data into the appointments table
    $sql = "INSERT INTO services (service, description, price) VALUES (?, ?, ?)";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("sss", $service, $description, $price);

    // Execute the query
    if ($stmt->execute()) {
        $_SESSION['servicesuccess'] = "Service added successfully.";
        header("Location: /dental-appointment-system/pages/dentist/services.php");
    } else {
        $_SESSION['serviceerror'] = "Service addition error. Please try again.";
        header("Location: /dental-appointment-system/pages/dentist/services.php");
    }
    // Close the prepared statement
    $stmt->close();
}
// Close the database connection
$conn->close();
?>