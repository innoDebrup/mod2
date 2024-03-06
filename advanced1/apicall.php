<?php

/**
 * Class APIcall.
 * 
 * Class to call API using curl and storing the response received.
 */
class APIcall
{
  /**
   * @var string $url The url of the API which we need to call.
   */
  public $url;
  
  /**
   * @var array $data The data received in array format after decoding the json response.
   */
  public $data;
  
  /**
   * APIcall constructor.
   *
   * @param string $url The url of the API to be called.
   */
  function __construct($url){
    $this->url = $url;
  }
  /**
   * Function to call the API.
   *
   * @return void
   */
  function call_api(){
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, $this->url);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);
    $resp = curl_exec($ch);
    if ($e = curl_error($ch)) {
      echo $e;
    }
    else {
      $this->data = json_decode($resp, true);
    }
    curl_close($ch);
  }
  /**
   * Function to get the data property of the object.
   *
   * @return array The data of the object.
   */
  function get_data(){
    return $this->data;
  }
}
