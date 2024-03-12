<?php

use GuzzleHttp\Client;
use Dotenv\Dotenv;
require 'vendor/autoload.php';
require 'send.php';
$dotenv = Dotenv::createImmutable(__DIR__);
$dotenv->load();

/**
 * Class to validate Mail and store related info.
 */
class ValidateMail {
  public $email;
  public $emailErrorMessage;
  public $validError;
  public $emailError = 0;

  public function __construct(string $email) {
    $this->email = $email;
  }

  function validate() {
    // Regular Expression to check if the email is in a valid format or not. 
    $regularExp = '/^[\w._]+@[\w]+(\.[a-z]{2,}){0,2}$/i';

    if (!preg_match($regularExp, $this->email)) {
      $this->emailError = 1;
      $this->emailErrorMessage = "Invalid email address format!";
    }
  
    if ($this->emailError != 1) {
      $client = new Client();
      $access_key = $_ENV['ACCESS_KEY'];
      $response = $client->request('GET', 'https://emailvalidation.abstractapi.com/v1/?api_key=' . $access_key . '&email=' . $this->email);
      // Stores the response received in the form of an array.
      $data = json_decode($response->getBody(), TRUE);
      // var_dump($data);
      if ($data["is_disposable_email"]["value"]) {
        $this->emailError = 1;
        $this->validError = "Disposable Emails are not allowed!";
      }
      elseif ($data['deliverability'] === 'UNDELIVERABLE') {
        $this->emailError = 1;
        $this->validError = "Invalid email as it is Undeliverable!";
      }
      else {
        // If everything is okay then call the send.php file to send the mail.
        sendMail($this->email);
        header('Location: message.php');
        exit;
      }
    }
  }
}
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