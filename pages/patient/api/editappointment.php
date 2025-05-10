<?php
session_start();
include '../../../conn.php';

if (isset($_POST['updatedata'])) {
    $id = $_POST['update_id'];
    $bookingDate = $_POST['bookingDate'];
    $preferredTime = $_POST['preferredTime'];

    if (!empty($id)) {
        // Use prepared statement to prevent SQL injection
        $query = "UPDATE appointments SET bookingDate = ?, preferredTime = ? WHERE id = ?";
        $stmt = mysqli_prepare($conn, $query);

        if ($stmt) {
            mysqli_stmt_bind_param($stmt, "ssi", $bookingDate, $preferredTime,   $id); // 's' = string, 'i' = integer
            $exec = mysqli_stmt_execute($stmt);

            if ($exec) {
                $_SESSION['saveupdate'] = "Appointment updated successfully.";
                header('Location: /dental-appointment-system/pages/patient/appointments.php');
            } else {
                $_SESSION['errorupdate'] = "Update error. Try again.";
                header('Location: /dental-appointment-system/pages/patient/appointments.php');
            }

            mysqli_stmt_close($stmt);
        } else {
            $_SESSION['errorupdate'] = "Database error. Try again.";
            header('Location: /dental-appointment-system/pages/patient/appointments.php');
        }

        header('Location: /dental-appointment-system/pages/patient/appointments.php');
        exit();
    }
}
?>
