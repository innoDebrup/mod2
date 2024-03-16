<?php
require 'ValidateMail.php';

$validError = $emailErrorMessage = "";
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
  $email = $_POST['email'];
  $evalObj = new ValidateMail($email);
  $evalObj->validate();
  if($evalObj->emailError){
    $validError = $evalObj->validError;
    $emailErrorMessage = $evalObj->emailErrorMessage;
    require 'error.php';
  }
}