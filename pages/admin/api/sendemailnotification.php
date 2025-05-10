<?php
session_start();
include '../../../conn.php';

use PHPMailer\PHPMailer\PHPMailer;
require '../../../vendor/autoload.php';

require '../../../vendor/phpmailer/phpmailer/src/Exception.php';
require '../../../vendor/phpmailer/phpmailer/src/PHPMailer.php';
require '../../../vendor/phpmailer/phpmailer/src/SMTP.php';

$id = $_GET['id'];
$query = "SELECT * FROM appointments WHERE id='$id'";
$result = mysqli_query($conn, $query) or die(mysqli_error($conn));

if ($result && mysqli_num_rows($result) > 0) {
  $row = mysqli_fetch_assoc($result);

  $mail = new PHPMailer(true);
  try {
    $mail->isSMTP();
    $mail->Host = 'smtp.gmail.com';
    $mail->Port = 587;
    $mail->SMTPAuth = true;
    $mail->SMTPSecure = 'tls';
    $mail->Username = 'brosaskndrx05@gmail.com';
    $mail->Password = 'gfka wrqs kegy dubc';

    $mail->setFrom('brosaskndrx05@gmail.com', 'Trinity Smiles Dental');
    $mail->addReplyTo($row['email'], $row['name']);
    $mail->addAddress($row['email'], $row['name']);

    $mail->Subject = 'Your Appointment Has Been Approved';
    $name = htmlspecialchars($row['name']);
    $dateObj = new DateTime($row['bookingDate']);
    $date = $dateObj->format('F j, Y');
    $time = htmlspecialchars($row['preferredTime']);
    $dentist = htmlspecialchars($row['assigned_doctor']);

    $cid = $mail->addEmbeddedImage('clockt.png', 'image_cid');

    $mail->isHTML(true);
    $mail->Body = '
<html>
  <head></head>
  <body>
    <header style="background-color: #1fa6dc; padding: 10px">
      <a style="font-size: 20px; color: black; font-family: Arial, Helvetica, sans-serif; display: flex; flex-direction: row; align-items: center; text-decoration: none;">
        <img src="cid:image_cid" width="50" style="margin-right: 10px;"/>
        <b>Trinity Smiles Dental</b>
      </a>
    </header>
    <p style="font-family: Arial, Helvetica, sans-serif; font-size: 16px;"><strong>Dear ' . $name . ',</strong></p>
    <p style="font-family: Arial, Helvetica, sans-serif;">
      We are pleased to inform you that your appointment has been <strong>approved</strong>.
    </p>
    <p style="font-family: Arial, Helvetica, sans-serif; font-size: 15px;">
      <strong>Appointment Date:</strong> ' . $date . '<br/>
      <strong>Time:</strong> ' . $time . ' <br/>
      <strong>Dentist:</strong> Dr. ' . $dentist . ' <br/>
    </p>
    <p style="font-family: Arial, Helvetica, sans-serif;">
      Please arrive on time and bring any necessary documents.
    </p>
    <p style="font-family: Arial, Helvetica, sans-serif;">
      Thank you and we look forward to assisting you.
    </p>
    <p style="font-family: Arial, Helvetica, sans-serif;">
      Best regards,<br/>
      <strong>Trinity Smiles Dental</strong>
    </p>
  </body>
</html>';

    $mail->AltBody = "Dear $name,\n\nYour appointment has been approved.\n\nAppointment Date: $date\nTime: $time\n\nDentist: $dentist\n\nPlease arrive on time and bring any necessary documents.\n\nThank you.\nTrinity Smiles Dental";

    $mail->send();
    $_SESSION['emailsent'] = "Appointment email sent successfully!";
  } catch (Exception $e) {
    $_SESSION['emailerror'] = "Email could not be sent. Error: {$mail->ErrorInfo}";
  }

  header('Location: /dental-appointment-system/pages/admin/appointments.php');
  exit();
} else {
  $_SESSION['emailerror'] = "No appointment found.";
  header('Location: /dental-appointment-system/pages/admin/appointments.php');
  exit();
}
?>