<?php
require 'vendor/autoload.php';
use Dotenv\Dotenv;

/**
 * Class for using phpdotenv package.
 */
class LoadEnv {

  /**
   * Method for creating Dotenv object and performing .env load operation.
   *
   * @return void
   */
  public static function loadDotenv() {
    $dotenv = Dotenv::createImmutable(__DIR__);
    $dotenv->load();
  } 
}
