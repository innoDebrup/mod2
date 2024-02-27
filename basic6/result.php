<?php
require "upload.php";
require "phoneNumber.php";
require "email.php";
require "nameMarks.php";
require "pdf.php";
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Basic Assignment Output</title>
    <link rel="stylesheet" href="style.css" type="text/css">
</head>

<body>

    <div class="<?php echo ($uploadOk === 0 || $marksError === 1 || $emailError === 1) ? "error" : "hide"; ?>">
        <span>ERROR!</span>
        <p>
            <?php
            if ($uploadOk === 0) {
                echo $errorMessage;
            } elseif ($marksError === 1) {
                foreach ($marksErrorMessage as $x) {
                    echo $x . nl2br("\n");
                }
            } else {
                echo $emailErrorMessage;
                echo $validError;
            }
            ?>
        </p>
    </div>

    <div class="<?php echo ($uploadOk === 0 || $marksError === 1 || $emailError === 1) ? "hide" : "show"; ?>">
        <!-- Greet the user once the form is submitted. -->
        <div class="greet">
            <p class="message">
                <?php
                if ($fullName !== " " && $fullName !== "") {
                    echo "Hello $fullName!";
                }
                ?>
            </p>
        </div>
        <!-- Display Uploaded Image. -->
        <div style="display: <?php echo (isset($_FILES["image"]) && $uploadOk == 1) ? "block" : "none"; ?>;">
            <div class="displayImage">
                <p>Uploaded Image:</p>
                <img src="<?php echo $targetFile; ?>" alt="Uploaded Image">
                <p><?php echo $displayName; ?></p>
            </div>
        </div>
        <!-- Display error incase wrong type of file is uploaded. -->
        <div style="display: <?php echo ($uploadOk === 0) ? "block" : "none"; ?>;">
            <div class="errorCon">
                <p><?php echo $errorMessage; ?></p>
            </div>
        </div>

        <div class="tableCon">
            <table>
                <thead>
                    <tr>
                        <th>Subject</th>
                        <th>Marks</th>
                    </tr>
                    </tr>
                </thead>
                <tbody>
                    <!-- Generates rows and their contents based on the final array obtained. -->
                    <?php
                    foreach ($marksFinal as $x) {
                        echo    "<tr>
                                    <td>$x[0]</td>
                                    <td>$x[1]</td>
                                <tr>";
                    }
                    ?>
                </tbody>
            </table>
        </div>
        <div class="phcon">
            <p>Your phone number is: <span><?php echo $phone ?></span></p>
        </div>
        <div class="emcon">
            <p>Your email address is: <span><?php echo $email ?></span></p>
            <p>Your email is valid!</p>
        </div>
    </div>
    
    
</body>
</html>


