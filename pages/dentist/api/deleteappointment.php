<?php
session_start();
include '../../../conn.php';

if (isset($_POST['delete_id'])) {
    $id = $_POST['delete_id'];

    // Use prepared statement to prevent SQL injection
    $stmt = $conn->prepare("DELETE FROM appointments WHERE id = ?");
    $stmt->bind_param("i", $id); // "i" indicates the variable type is integer

    if ($stmt->execute()) {
        $_SESSION['deletesuccess'] = "Appointment deleted successfully.";
        header('Location: /dental-appointment-system/pages/dentist/appointments.php');
    } else {
        $_SESSION['deleteerror'] = "Deletion Error. Please try again.";
        header('Location: /dental-appointment-system/pages/dentist/appointments.php');
    }

    $stmt->close();
    header('Location: /dental-appointment-system/pages/dentist/appointments.php');
    exit(); // Good practice to exit after header redirect
}
?>