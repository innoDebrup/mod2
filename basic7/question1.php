<!--Question_1 page.-->
<?php
session_start();
if (!isset($_SESSION['username'])) {
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
    <title>Question 1</title>
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
        <h1>Assignment-1</h1>
        <div>
            <p>Create a form with below fields:</p>
            <ul>
                <li>First Name - User will input only alphabets</li>
                <li>Last Name - User will input only alphabets</li>
                <li>Full name: User cannot enter a value in Full name field. It will be disabled by default. When the first name and last name fields are filled, this field outputs the sum of the above 2 fields.</li>
                <li>Submit Button
                    <ul class="sub">
                        <li>On submit, the form gets submitted and the page will reload</li>
                        <li>Hello [full-name]” will appear on the page</li>
                    </ul>
                </li>
            </ul>
        </div>
    </div>
</body>

</html>
