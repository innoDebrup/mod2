<?php
require 'LoadEnv.php';
use PHPMailer\PHPMailer\PHPMailer;

/**
 * Class for performing Mail related operations using PHPMailer package.
 */
class Mailer {

  /**
   * Method to send mail.
   *
   * @param string $email
   *  Email id to which the email is to be sent to.
   * 
   * @return void
   */
  public function sendMail(string $email) {
    LoadEnv::loadDotenv();
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
}
