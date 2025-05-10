<?php
session_start();
require_once '../../../conn.php';

function generateUUID()
{
    return sprintf(
        '%04x%04x-%04x-%04x-%04x-%04x%04x%04x',
        mt_rand(0, 0xffff),
        mt_rand(0, 0xffff),
        mt_rand(0, 0xffff),
        mt_rand(0, 0x0fff) | 0x4000,
        mt_rand(0, 0x3fff) | 0x8000,
        mt_rand(0, 0xffff),
        mt_rand(0, 0xffff),
        mt_rand(0, 0xffff)
    );
}
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Validate and sanitize inputs
    $name = trim($_POST['name']);
    $email = trim($_POST['email']);
    $username = trim($_POST['username']);
    $password = trim($_POST['password']);
    $phone = trim($_POST['phone']);
    $role = trim($_POST['role']);
    $user_id = generateUUID();

    // Store entered values in session (except password for security)
    $_SESSION['entered_name'] = $name;
    $_SESSION['entered_username'] = $username;

    // Check if the username already exists
    $check_sql = "SELECT id FROM users WHERE username = ?";
    $check_stmt = $conn->prepare($check_sql);
    $check_stmt->bind_param("s", $username);
    $check_stmt->execute();
    $check_stmt->store_result();

    if ($check_stmt->num_rows > 0) {
        $_SESSION['userexists'] = "Username is already taken.";
        header("Location: /dental-appointment-system/pages/admin/users.php");
        exit;
    }

    // Check if the email already exists
    $check_email_sql = "SELECT id FROM users WHERE email = ?";
    $check_email_stmt = $conn->prepare($check_email_sql);
    $check_email_stmt->bind_param("s", $email);
    $check_email_stmt->execute();
    $check_email_stmt->store_result();

    if ($check_email_stmt->num_rows > 0) {
        $_SESSION['emailexists'] = "Email is already taken.";
        header("Location: /dental-appointment-system/pages/admin/users.php");
        exit;
    }

    // Hash the password for security
    $hashed_password = password_hash($password, PASSWORD_DEFAULT);

    $sql = "INSERT INTO users (user_id, name, email, username, password, phone, role, created_at, updated_at) 
    VALUES (?, ?, ?, ?, ?, ?, ?, NOW(), NOW())"; // Use NOW() for current timestamp
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("sssssss", $user_id, $name, $email, $username, $hashed_password, $phone, $role);

    if ($stmt->execute()) {
        unset($_SESSION['entered_name'], $_SESSION['entered_username']); // Clear saved inputs
        $_SESSION['registrationsuccess'] = "User Added Successfully.";
        header("Location: /dental-appointment-system/pages/admin/users.php");
    } else {
        $_SESSION['registrationfailed'] = "User Addition Failed. Please try again.";
        header("Location: /dental-appointment-system/pages/admin/users.php");
    }
    // Close statement
    $stmt->close();
}

// Close database connection
$conn->close();
?>