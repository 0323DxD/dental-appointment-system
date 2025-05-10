<?php
include 'conn.php';
session_start();

// Today's date
$today = date('Y-m-d');

// Upcoming appointments (appointments in the next 7 days)
$upcomingAppointments = $conn->query("SELECT COUNT(*) as total FROM appointments WHERE DATE(bookingDate) > '$today' AND DATE(bookingDate) <= DATE_ADD('$today', INTERVAL 7 DAY)")->fetch_assoc();

// Summary queries for today's appointments, new patients, and cancelled appointments
$totalToday = $conn->query("SELECT COUNT(*) as total FROM appointments WHERE DATE(bookingDate) = '$today'")->fetch_assoc();
$newPatients = $conn->query("SELECT COUNT(*) as total FROM users WHERE role = 'patient' AND DATE(created_at) >= DATE_SUB(NOW(), INTERVAL 7 DAY)")->fetch_assoc();
$cancelled = $conn->query("SELECT COUNT(*) as total FROM appointments WHERE status = 'Canceled' AND DATE(bookingDate) = '$today'")->fetch_assoc();

// Return the data as JSON
echo json_encode([
    'today_appointments' => $totalToday['total'],
    'new_patients' => $newPatients['total'],
    'cancelled' => $cancelled['total'],
    'upcoming_appointments' => $upcomingAppointments['total']
]);

$conn->close(); // Close the connection
?>
