<?php
session_start();
include '../../../conn.php';

if (isset($_POST['updatedata'])) {
    $id = $_POST['update_id'];
    $notes = $_POST['notes'];

    if (!empty($id)) {
        // Use prepared statement to prevent SQL injection
        $query = "UPDATE prescriptions SET notes = ? WHERE id = ?";
        $stmt = mysqli_prepare($conn, $query);

        if ($stmt) {
            mysqli_stmt_bind_param($stmt, "si",  $notes, $id); // 's' = string, 'i' = integer
            $exec = mysqli_stmt_execute($stmt);

            if ($exec) {
                $_SESSION['saveprescription'] = "Prescription updated successfully.";
                header('Location: /dental-appointment-system/pages/dentist/prescription.php');
            } else {
                $_SESSION['errorprescription'] = "Update Error, Please try again.";
                header('Location: /dental-appointment-system/pages/dentist/prescription.php');
            }

            mysqli_stmt_close($stmt);
        } else {
            $_SESSION['errorupdate'] = "Database error. Try again.";    
        }
        header('Location: /dental-appointment-system/pages/dentist/prescription.php');
        exit();
    }
}
?>
