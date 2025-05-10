<?php
session_start();

include '../../../conn.php';
if (isset($_POST['updatepassword'])) {
    $id = $_POST['updatepassword_id'];
    $password = md5($_POST['password']);
    $last_password_change = date("Y-m-d H:i:s");

    if (!empty($id)) {
        $query = "UPDATE users SET password = '$password', last_password_change = '$last_password_change' WHERE id='$id'";
        $query_run = mysqli_query($conn, $query);
        if ($query_run) {
            $_SESSION['updatesuccess'] = "Password Updated Successfully";
            header('Location: /dental-appointment-system/pages/dentist/settings.php');
        } else {
            $_SESSION['updateerror'] = "Update Error. Please try again";
            header('Location: /dental-appointment-system/pages/dentist/settings.php');
        }
    }
}
?>