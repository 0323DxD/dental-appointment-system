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

    $mail->Subject = 'Your Appointment Has Been Canceled';
    $name = htmlspecialchars($row['name']);
    $dateObj = new DateTime($row['bookingDate']);
    $date = $dateObj->format('F j, Y');
    $time = htmlspecialchars($row['preferredTime']);

    $cid = $mail->addEmbeddedImage('clockt.png', 'image_cid');

    $mail->isHTML(true);
    $mail->Body = '
<html>
  <head></head>
  <body>
    <header style="background-color: #1fa6dc; padding: 10px">
      <a style="font-size: 20px; color: white; font-family: Arial, Helvetica, sans-serif; display: flex; flex-direction: row; align-items: center; text-decoration: none;">
        <img src="cid:image_cid" width="50" style="margin-right: 10px;"/>
        <b>Trinity Smiles Dental</b>
      </a>
    </header>
    <p style="font-family: Arial, Helvetica, sans-serif; font-size: 16px;">Dear ' . $name . ',</p>
    <p style="font-family: Arial, Helvetica, sans-serif;">
      We regret to inform you that your appointment scheduled for the following has been <strong>canceled</strong>:
    </p>
    <p style="font-family: Arial, Helvetica, sans-serif;">
      <strong>Date:</strong> ' . $date . '<br/>
      <strong>Time:</strong> ' . $time . '
    </p>
    <p style="font-family: Arial, Helvetica, sans-serif;">
      We apologize for the inconvenience. Please contact us if you would like to reschedule.
    </p>
    <p style="font-family: Arial, Helvetica, sans-serif;">
      Thank you for your understanding.
    </p>
    <p style="font-family: Arial, Helvetica, sans-serif;">
      Best regards,<br/>
      <strong>Trinity Smiles Dental</strong>
    </p>
  </body>
</html>';

    $mail->AltBody = "Dear $name,\n\nWe regret to inform you that your appointment on $date at $time has been canceled.\n\nPlease contact us if you'd like to reschedule.\n\nThank you for your understanding.\nTrinity Smiles Dental";

    $mail->send();
    $_SESSION['emailsent'] = "Appointment cancellation email sent successfully!";
  } catch (Exception $e) {
    $_SESSION['emailerror'] = "Email could not be sent. Error: {$mail->ErrorInfo}";
  }

  header('Location: /dental-appointment-system/pages/dentist/appointments.php');
  exit();
} else {
  $_SESSION['emailerror'] = "No appointment found.";
  header('Location: /dental-appointment-system/pages/dentist/appointments.php');
  exit();
}
?>