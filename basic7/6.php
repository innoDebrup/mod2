<!--Question_6 page.-->
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
    <title>Question 6</title>
</head>
<body>
    <div class="quest">
        <h1>Assignment-6</h1>
        <div>
            <p>When the user submits the above form, 2 copies of the data will get created in a doc format. 
                One will store on the server and the other will be downloaded to the user submitting the data.
                The information in the doc should be presented in a well-defined manner.
            </p>
        </div>
    </div>
</body>
</html>
