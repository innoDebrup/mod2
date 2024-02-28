<?php
    if($_SERVER["REQUEST_METHOD"]=="POST"){
        session_start();
        $_SESSION["username"] = $_POST["username"];
        $_SESSION["password"] = $_POST["password"];

        header("Location:entry.php");
        exit;
    }
    else{
        header("Location:error.php");
        exit;
    }
?>