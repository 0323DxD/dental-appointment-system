<?php
// Start session if needed
session_start();

// Include your database connection file (conn.php)
include '../../../conn.php';

// Check if form is submitted via POST
if ($_SERVER['REQUEST_METHOD'] == "POST") {
    // Collect the form data from POST
    $dentist_name = $_POST['dentist_name'];
    $patient_name = $_POST['patient_name'];
    $notes = $_POST['notes'];

    // Prepare an SQL query to insert the data into the appointments table
    $sql = "INSERT INTO prescriptions (dentist_name, patient_name, notes) VALUES (?, ?, ?)";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("sss", $dentist_name, $patient_name, $notes);

    // Execute the query
    if ($stmt->execute()) {
        $_SESSION['prescriptionsuccess'] = "Prescription added successfully.";
        header("Location: /dental-appointment-system/pages/admin/prescription.php");
    } else {
        $_SESSION['prescriptionerror'] = "Prescription addition error. Please try again.";
        header("Location: /dental-appointment-system/pages/admin/prescription.php");
    }
    // Close the prepared statement
    $stmt->close();
}
// Close the database connection
$conn->close();
?>