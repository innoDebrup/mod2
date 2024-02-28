<?php
session_start();
if(!isset($_SESSION['username'])){
    header('Location: error.php');
    exit;
}
$number = intval($_GET['q']);
if($number >= 1 && $number <= 7){
    header("Location: ".$number.".php");
    exit;
}
else{
    header("Location: unavailable.php");
    exit;
}
?>
