<?php
require 'vendor/autoload.php';
use Dotenv\Dotenv;

class LoadEnv {
  public static function loadDotenv(){
    $dotenv = Dotenv::createImmutable(__DIR__);
    $dotenv->load();
  } 
}
?>