<!--Question_4 page.-->
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
    <title>Question 4</title>
</head>
<body>
    <div class="flexSpabet container">
        <!-- Redirects the users back to the welcome page. -->
        <div>
            <a href="welcome.php">Back to Welcome</a>
        </div>
        <!-- Logout button for users for Logging out of their current session. -->
        <div>
            <a href="logout.php">Logout</a>
        </div>
    </div>
    <div class="quest">
        <h1>Assignment-4</h1>
        <div>
            <p>
                Add a new text field to the above form to accept the phone number from the user. 
                The number will belong to an Indian user. 
                So, the number should begin with +91 and not be more than 10 digits.
            </p>
        </div>
    </div>
</body>
</html>
