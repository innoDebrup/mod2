<?php
    // Create New Session if posted username and password are valid.
    if($_SERVER["REQUEST_METHOD"]=="POST"){
        session_start();
        $_SESSION["username"] = $_POST["username"];
        $_SESSION["password"] = $_POST["password"];
        header("Location:entry.php");   //
        exit;
    }
    else{
        //If checks fail then redirect to error/invalid page.
        header("Location:error.php");
        exit;
    }
?>
