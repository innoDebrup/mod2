<?php
session_start();
session_unset();
session_destroy();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Logout</title>
    <link rel="stylesheet" href="style.css" type="text/css">
</head>

<body>
    <div class="quest">
        <div>
            <h1>Logged-Out Successfully</h1>
        </div>
        <div>
            <a href="index.php">Login Again</a>
        </div>
    </div>

</body>

</html>