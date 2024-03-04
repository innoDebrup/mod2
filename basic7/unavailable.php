<?php
    session_start();
    if(!isset($_SESSION['username'])){
        header("Location: error.php");
        exit;
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./styles/style.css" type="text/css">
    <title>Unavailable</title>
</head>
<body>
    <div class="quest">
        <p>Page is unavailable. Only pages of Questions 1 to 7 are available !!!</p>
        <a href="welcome.php">Go back to Welcome page</a>
    </div>
    
</body>
</html>
