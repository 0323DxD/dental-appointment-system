<?php
// Start session if needed
session_start();

// Include your database connection file (conn.php)
include '../../../conn.php';

// Check if form is submitted via POST
if ($_SERVER['REQUEST_METHOD'] == "POST") {
    // Collect the form data from POST
    $user_id = $_POST['user_id'];
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
        $_SESSION['booking_error'] = "The selected time slot is already booked. Please choose another time.";
        header("Location: /dental-appointment-system/pages/patient/appointments.php");
        echo "";
    } else {
        // Proceed with insert
        $sql = "INSERT INTO appointments (user_id, name, age, email, contact, medicalRecord, `procedure`, price, bookingDate, preferredTime, insurance, status, created_at, updated_at)
                VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, 'Pending', CURRENT_TIMESTAMP, CURRENT_TIMESTAMP)";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("ssissssssss",$user_id, $name, $age, $email, $contact, $medicalRecord, $procedure, $price, $bookingDate, $preferredTime, $insurance);


        // Execute the query
        if ($stmt->execute()) {
            unset(
                $_SESSION['entered_name'],
                $_SESSION['entered_age'],
                $_SESSION['entered_email'],
                $_SESSION['entered_contact'],
                $_SESSION['entered_date'],
                $_SESSION['entered_time']
            );
            $_SESSION['booking_success'] = "Your appointment has been successfully booked. Our Dental Support Team will message you to confirm your appointment. Thank you.";
            header("Location: /dental-appointment-system/pages/patient/appointments.php");
        } else {
            $_SESSION['booking_error'] = "Booking failed. Please try again.";
            header("Location: /dental-appointment-system/pages/patient/appointments.php");
        }
    }
    // Close the prepared statement
    $stmt->close();
}
// Close the database connection
$conn->close();
?>