<?php
require 'ValidateMail.php';
// Call the required class and process the email as received from POST.
$validError = $emailErrorMessage = "";
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
  $email = $_POST['email'];
  $evalObj = new ValidateMail($email);
  $evalObj->validate();
  // If email validation fails at any stage then show the message.
  if ($evalObj->emailError) {
    $validError = $evalObj->validError;
    $emailErrorMessage = $evalObj->emailErrorMessage;
    require 'error.php';
  }
}