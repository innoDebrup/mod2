<!--Question_3 page.-->
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
    <title>Question 3</title>
</head>

<body>
    <div class="quest">
        <h1>Assignment-3</h1>
        <div>
            <p>
            Add a text area to the above form and accept marks of different subjects in the format, English|80. 
            One subject in each line. 
            Once values entered and submitted, accept them to display the values in the form of a table.
            </p>
        </div>
    </div>
</body>

</html>
