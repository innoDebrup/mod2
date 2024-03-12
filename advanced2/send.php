<?php

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;
use Dotenv\Dotenv;
require 'vendor/autoload.php';
$dotenv = Dotenv::createImmutable(__DIR__);
$dotenv->load();

/**
 * Function to send mail.
 *
 * @param string $email
 * Email id to which the email is to be sent to.
 * 
 * @return void
 */
function sendMail($email){
  $mail = new PHPMailer(TRUE);
  $mail->isSMTP();
  // Setting the sender mail configuration.
  $mail->Host = 'smtp.gmail.com';
  $mail->SMTPAuth = TRUE;
  // Accessing key values from .env file.
  $mail->Username = $_ENV['USER_NAME'];
  $mail->Password = $_ENV['PASSWORD'];
  // SMTP port.
  $mail->Port = 465;
  // Standard TLS encryption.
  $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;
  // Setting Receipient Mail and the message to send.
  $mail->setFrom($mail->Username);
  $mail->addAddress($email);
  $mail->Subject = ("Welcome Mail :)");
  $mail->Body = 'Thank you for your submission';
  $mail->send();
}
