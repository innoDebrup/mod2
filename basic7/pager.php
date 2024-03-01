<?php
session_start();
if(!isset($_SESSION['username'])){
    header('Location: error.php');
    exit;
}
//Redirects user to the requested page if it is within the defined range.
$number = intval($_GET['q']);
if($number >= 1 && $number <= 7){
    header("Location: question".$number.".php");
    exit;
}
//if any other page is requested then redirect to unavailable page
else{
    header("Location: unavailable.php");
    exit;
}
?>
