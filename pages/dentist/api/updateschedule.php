<?php
session_start();
include '../../../conn.php';

if (isset($_POST['updatedata'])) {
    $id = $_POST['update_id'];
    $status = $_POST['status'];

    if (!empty($id)) {
        // Use prepared statement to prevent SQL injection
        $query = "UPDATE appointments SET `status` = ? WHERE id = ?";
        $stmt = mysqli_prepare($conn, $query);

        if ($stmt) {
            mysqli_stmt_bind_param($stmt, "si", $status,  $id); // 's' = string, 'i' = integer
            $exec = mysqli_stmt_execute($stmt);

            if ($exec) {
                $_SESSION['saveupdate'] = "Schedule updated successfully.";
                header('Location: /dental-appointment-system/pages/dentist/appointments.php');
            } else {
                header('Location: /dental-appointment-system/pages/dentist/appointments.php');
            }

            mysqli_stmt_close($stmt);
        } else {
            $_SESSION['errorupdate'] = "Database error. Try again.";
            header('Location: /dental-appointment-system/pages/dentist/appointments.php');
        }

        header('Location: /dental-appointment-system/pages/dentist/appointments.php');
        exit();
    }
}
?>
