<?php
session_start();
require_once 'conn.php';

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
    $password = trim($_POST['password']); // Plaintext password input
    $phone = trim($_POST['phone']); // Plaintext password input
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
        header("Location: signup.php");
        exit;
    }

    $check_stmt->close(); // Close the check statement

    // Hash the password for security
    $hashed_password = password_hash($password, PASSWORD_DEFAULT);

    $sql = "INSERT INTO users (user_id, name, email, username, password, phone, role, created_at, updated_at) 
    VALUES (?, ?, ?, ?, ?, ?, ?, NOW(), NOW())"; // Use NOW() for current timestamp
    $role = 'Patient';  // Default role is now 'patient'
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("sssssss", $user_id, $name, $email, $username, $hashed_password, $phone, $role);

    if ($stmt->execute()) {
        unset($_SESSION['entered_name'], $_SESSION['entered_username']); // Clear saved inputs
        $_SESSION['registrationsuccess'] = "Registration Successfully. You can now sign in.";
        header("Location: signin.php");
    } else {
        $_SESSION['registrationfailed'] = "Registration Failed";
        header("Location: signup.php");
    }

    // Close statement
    $stmt->close();
}

// Close database connection
$conn->close();
?>