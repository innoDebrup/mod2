<!--Question_2 page.-->
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
    <link rel="stylesheet" href="style.css" type="text/css">
    <title>Question 2</title>
</head>

<body>
    <div class="quest">
        <h1>Assignment-2</h1>
        <div>
            <p>
            Add a new field to accept user image in addition to the above fields.
            On submit store the image in the backend and display it with the full name below it.
            </p>

        </div>
    </div>
</body>

</html>
