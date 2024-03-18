<?php
require_once 'Mailer.php';
use GuzzleHttp\Client;

/**
 * Class to validate Mail and store related info.
 */
class ValidateMail extends Mailer {
  
  /**
   * Variable to store the email address.
   *
   * @var string
   */
  private $email;

  /**
   * Variable to store the email address format error message.
   *
   * @var string
   */
  public $emailErrorMessage;
  
  /**
   * Variable to store the email validation error message.
   *
   * @var string
   */
  public $validError;

  /**
   * Variable to store if email is acceptable or not.
   * 0 if everything is okay OR 1 if any check fails.
   *
   * @var integer
   */
  public $emailError = 0;

  public function __construct(string $email) {
    $this->email = $email;
  }

  /**
   * Method to validate email address.
   *
   * @return void
   */
  function validate() {
    // Check if the email is in valid format or not.
    // If not okay then enter this block.
    if (!(filter_var($this->email, FILTER_VALIDATE_EMAIL))) {
      $this->emailError = 1;
      $this->emailErrorMessage = "Invalid email address format!";
    }
    //If email format is valid then enter this block.
    if ($this->emailError != 1) {
      LoadEnv::loadDotenv();
      $client = new Client();
      $access_key = $_ENV['ACCESS_KEY'];
      $response = $client->request('GET', 'https://emailvalidation.abstractapi.com/v1/?api_key=' . $access_key . '&email=' . $this->email);
      // Stores the response received in the form of an array.
      $data = json_decode($response->getBody(), TRUE);
      // If email address given is a temporary one then reject it.
      if ($data["is_disposable_email"]["value"]) {
        $this->emailError = 1;
        $this->validError = "Disposable Emails are not allowed!";
      }
      // If email address is undeliverable then reject it.
      elseif ($data['deliverability'] === 'UNDELIVERABLE') {
        $this->emailError = 1;
        $this->validError = "Invalid email as it is Undeliverable!";
      }
      // If everything is okay then send the mail.
      else {
        $this->sendMail($this->email);
        header('Location: message.php');
        exit;
      }
    }
  }
}
