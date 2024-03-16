<?php

use GuzzleHttp\Client;
require_once 'Mailer.php';
/**
 * Class to validate Mail and store related info.
 */
class ValidateMail extends Mailer{
  public $email;
  public $emailErrorMessage;
  public $validError;
  public $emailError = 0;

  public function __construct(string $email) {
    $this->email = $email;
  }

  function validate() {
    // Check if the email is in valid format or not.
    if (!(filter_var($this->email, FILTER_VALIDATE_EMAIL))) {
      $this->emailError = 1;
      $this->emailErrorMessage = "Invalid email address format!";
    }
  
    if ($this->emailError != 1) {
      LoadEnv::loadDotenv();
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
        $this->sendMail($this->email);
        header('Location: message.php');
        exit;
      }
    }
  }
}
