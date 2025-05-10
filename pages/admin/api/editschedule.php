<?php
session_start();
include '../../../conn.php';

if (isset($_POST['updatedata'])) {
    $id = $_POST['update_id'];
    $day = $_POST['day'];
    $startTime = $_POST['startTime'];
    $endTime = $_POST['endTime'];

    if (!empty($id)) {
        // Use prepared statement to prevent SQL injection
        $query = "UPDATE schedule SET day = ?, startTime = ?, endTime = ? WHERE id = ?";
        $stmt = mysqli_prepare($conn, $query);

        if ($stmt) {
            mysqli_stmt_bind_param($stmt, "sssi",$day, $startTime, $endTime,   $id); // 's' = string, 'i' = integer
            $exec = mysqli_stmt_execute($stmt);

            if ($exec) {
                $_SESSION['saveupdate'] = "Schedule updated successfully.";
                header('Location: /dental-appointment-system/pages/admin/schedule.php');
            } else {
                header('Location: /dental-appointment-system/pages/admin/schedule.php');
            }

            mysqli_stmt_close($stmt);
        } else {
            $_SESSION['errorupdate'] = "Database error. Try again.";
            header('Location: /dental-appointment-system/pages/admin/schedule.php');
        }

        header('Location: /dental-appointment-system/pages/admin/schedule.php');
        exit();
    }
}
?>
