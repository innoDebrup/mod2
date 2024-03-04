<?php 
    session_start();
    // If session is started successfully then redirect to welcome page.
    if (isset($_SESSION['username'])){
        header("Location:welcome.php");
        exit;
    }
    else{
        header("Location:error.php");
        exit;
    }
?>

