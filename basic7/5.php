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
    <title>Question 5</title>
</head>
<body>
    <div class="quest">
        <h1>Assignment-5</h1>
        <div>
            <p>Add a new single text field to the above form that will accept email id. Do not use email id input field type.</p>
            <ul>
                <li>Email Syntax check</li>
                    <ul class="sub">
                        <li>User will enter email id and on submit, check if correct email id syntax has been used.</li>
                        <li>Show a message on successful email syntax or show an error message on the wrong syntax.</li>
                    </ul>
                </li> 
                <li>Valid Email id check</li>
                    <ul class="sub">
                        <li>User will enter email id and on submit, use the following site http://www.mailboxlayer.com/ to check if the entered email id is valid.</li>
                    </ul>
                </li> 

            </ul>
        </div>
    </div>
</body>
</html>