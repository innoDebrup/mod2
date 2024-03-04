<!--Question_7 page.-->
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
    <title>Question 7</title>
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
        <h1>Assignment-7</h1>
        <div>
            <p>
                Create a login form (using session). 
                When logged in, implement pager with all above questions i.e one task per page. 
                We should be able to identify each question by directly opening the page link but only after login. 
                Ex: if i want the 4th question, i click on abc.com?q=4.
            </p>
        </div>
    </div>
</body>
</html>
