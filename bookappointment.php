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

if ($_SERVER['REQUEST_METHOD'] == "POST") {
    // Collect form data
    $name = $_POST['name'];
    $age = $_POST['age'];
    $email = $_POST['email'];
    $contact = $_POST['contact'];
    $medicalRecord = $_POST['medicalRecord'];
    $procedure = $_POST['procedure'];
    $price = $_POST['price'];
    $price = preg_replace('/[^\d.]/', '', $price); // Removes ₱ or other symbols
    $insurance = $_POST['insurance'];
    $bookingDate = $_POST['bookingDate'];
    $preferredTime = $_POST['preferredTime'];
    $appointment_id = generateUUID();
    // Store entered values in session
    $_SESSION['entered_name'] = $name;
    $_SESSION['entered_age'] = $age;
    $_SESSION['entered_email'] = $email;
    $_SESSION['entered_contact'] = $contact;
    $_SESSION['entered_date'] = $bookingDate;
    $_SESSION['entered_time'] = $preferredTime;


    // Check if the preferred time on the same booking date is already taken
    $checkSql = "SELECT * FROM appointments WHERE preferredTime = ? AND status = 'Scheduled'";
    $checkStmt = $conn->prepare($checkSql);
    $checkStmt->bind_param("s", $preferredTime);
    $checkStmt->execute();
    $result = $checkStmt->get_result();

    if ($result->num_rows > 0) {
        $_SESSION['bookingerror'] = "The selected time slot is already booked. Please choose another time.";
        header("Location: book.php");
        echo "";
    } else {
        // Proceed with insert
        $sql = "INSERT INTO appointments (user_id, name, age, email, contact, medicalRecord, `procedure`, price, bookingDate, preferredTime, insurance, status, created_at, updated_at)
                VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, 'Pending', CURRENT_TIMESTAMP, CURRENT_TIMESTAMP)";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("ssissssssss", $appointment_id, $name, $age, $email, $contact, $medicalRecord, $procedure, $price, $bookingDate, $preferredTime, $insurance);

        if ($stmt->execute()) {
            unset(
                $_SESSION['entered_name'],
                $_SESSION['entered_age'],
                $_SESSION['entered_email'],
                $_SESSION['entered_contact'],
                $_SESSION['entered_date'],
                $_SESSION['entered_time']
            );
            $_SESSION['form_submitted'] = true;
            header("Location: success.php");
            exit();
        } else {
            echo "Error: " . $stmt->error;
        }

        $stmt->close();
    }

    $checkStmt->close();
}

$conn->close();
?>