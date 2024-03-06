<?php
// Contains the credentials for accessing the API.
require "access.php";
$email = $emailErrorMessage = $validError = "";
$emailError = 0;
// Regular Expression to check if the email is in a valid format or not. 
$regularExp = '/^[\w._]+@[\w]+(\.[a-z]{2,}){0,2}$/i';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
  $email = $_POST['email'];

  if (!preg_match($regularExp, $email)) {
    $emailError = 1;
    $emailErrorMessage = "Invalid email address format!";
  }

  if ($emailError != 1) {
    $ch = curl_init();
    curl_setopt_array($ch, [
      CURLOPT_URL => 'https://emailvalidation.abstractapi.com/v1/?api_key=' . $access_key . '&email=' . $email,
      CURLOPT_RETURNTRANSFER => TRUE,
      CURLOPT_FOLLOWLOCATION => FALSE
    ]);
    $response = curl_exec($ch);
    // Stores the response received in the form of an array.
    $data = json_decode($response, TRUE);

    if ($data["is_disposable_email"]["value"] === TRUE) {
      $emailError = 1;
      $validError = "Disposable Emails are not allowed!";
    }
    elseif ($data['deliverability'] === 'UNDELIVERABLE') {
      $emailError = 1;
      $validError = "Invalid email as it is Undeliverable!";
    }
    else {
      // If everything is okay then call the send.php file to send the mail.
      include 'send.php';
    }
  }
  // If any error occured, then redirect to error page.
  if ($emailError === 1) {
    header('Location: error.php');
    exit;
  }
}
