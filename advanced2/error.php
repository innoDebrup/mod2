<?php
require 'email.php';
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./styles/style.css" type="text/css">
    </link>
    <title>Error</title>
</head>

<body>
    <div class="container col">
        <h1>Error</h1>
        <h2>
            <?php
            echo $validError;
            echo $emailErrorMessage;
            ?>
        </h2>
    </div>
</body>

</html>