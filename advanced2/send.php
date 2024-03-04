<?php

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

require 'vendor/autoload.php';
require 'cred.php';

$mail = new PHPMailer(true);
$mail->isSMTP();
$mail->Host = 'smtp.gmail.com';
$mail->SMTPAuth = true;
$mail->Username = $userName;
$mail->Password = $passWord;
$mail->Port = 465;
$mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;

$mail->setFrom($userName);
$mail->addAddress($email);
$mail->Subject = ("Welcome Mail :)");
$mail->Body = 'Thank you for your submission';
$mail->send();

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="./styles/style.css" type="text/css"></link>
</head>
<body>
    <div class="container">
        <h1>Message Sent Successfully !!!</h1>
    </div>
</body>
</html>