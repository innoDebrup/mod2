<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

require 'vendor/autoload.php';
// Required for signing in to our email SMTP server.
require 'cred.php';

$mail = new PHPMailer(TRUE);
$mail->isSMTP();
// Setting the sender mail configuration.
$mail->Host = 'smtp.gmail.com';
$mail->SMTPAuth = TRUE;
$mail->Username = $userName;
$mail->Password = $passWord;
// SMTP port.
$mail->Port = 465;
// Standard TLS encryption.
$mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;
// Setting Receipient Mail and the message to send.
$mail->setFrom($userName);
$mail->addAddress($email);
$mail->Subject = ("Welcome Mail :)");
$mail->Body = 'Thank you for your submission';
$mail->send();
?>

<!-- HTML to display a message if the message was sent successfully. -->
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
  <link rel="stylesheet" href="./styles/style.css" type="text/css">
  </link>
</head>

<body>
  <div class="container">
    <h1>Message Sent Successfully !!!</h1>
  </div>
</body>

</html>
