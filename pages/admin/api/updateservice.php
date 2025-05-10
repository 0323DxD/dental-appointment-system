<?php
session_start();
include '../../../conn.php';

if (isset($_POST['updatedata'])) {
    $id = $_POST['update_id'];
    $service = $_POST['service'];
    $description = $_POST['description'];
    $price = $_POST['price'];

    if (!empty($id)) {
        // Use prepared statement to prevent SQL injection
        $query = "UPDATE services SET service = ?, description = ?, price = ? WHERE id = ?";
        $stmt = mysqli_prepare($conn, $query);

        if ($stmt) {
            mysqli_stmt_bind_param($stmt, "sssi", $service, $description, $price, $id); // 's' = string, 'i' = integer
            $exec = mysqli_stmt_execute($stmt);

            if ($exec) {
                $_SESSION['saveupdate'] = "Service updated successfully.";
                header('Location: /dental-appointment-system/pages/admin/services.php');
            } else {
                $_SESSION['errorupdate'] = "Update Error, Please try again.";
                header('Location: /dental-appointment-system/pages/admin/services.php');
            }

            mysqli_stmt_close($stmt);
        } else {
            $_SESSION['errorupdate'] = "Database error. Try again.";
        }
        header('Location: /dental-appointment-system/pages/admin/services.php');
        exit();
    }
}
?>
