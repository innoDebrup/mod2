<?php
use GuzzleHttp\Client;
require 'vendor/autoload.php';

/**
 * Class APICall to store url of the API, send request to the API, and store the response received of API.
 */
class APICall {

  /**
   * The url of the API which we need to call.
   * 
   * @var string
   */
  public $url;
  
  /**
   * The data received in array format after decoding the json response.
   * 
   * @var array 
   */
  public $data;
  
  /**
   * APIcall constructor.
   * 
   * @param string $url
   * The url of the API to be called.
   */
  public function __construct(string $url) {
    $this->url = $url;
  }

  /**
   * Function to call the API.
   * 
   * @return void
   */
  public function callAPI() {
    $client = new Client();
    $response = $client->request('GET', $this->url);
    $this->data = json_decode($response->getBody(), TRUE);
  }

  /**
   * Function to get the data property of the object.
   * 
   * @return array 
   * The data of the object.
   */
  public function getData() {
    return $this->data;
  }
}
