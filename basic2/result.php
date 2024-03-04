<?php
require "upload.php";
$fullName = "";
$re = '/^[a-z]+$/i'; // Regex to check all characters of the string are only alphabets.
$firstName = htmlspecialchars($_POST['firstName']);
$lastName = htmlspecialchars($_POST['lastName']);
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (preg_match($re, $firstName) && preg_match($re, $lastName)) {
        $fullName = $firstName . " " . $lastName;
    }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Basic Assignment Output</title>
    <link rel="stylesheet" href="./styles/style.css" type="text/css">
</head>

<body>
    <!-- If Upload is not successful, show this div. -->
    <div class="<?php echo ($uploadOk === 0) ? "error" : "hide"; ?>">
        <span>ERROR!</span>
        <p>
            <?php
            if ($uploadOk === 0)
                echo $errorMessage;
            ?>
        </p>
    </div>
    <!-- If Upload is successful then show this div. -->
    <div class="<?php echo ($uploadOk === 0) ? "hide" : "show"; ?>">
        <!-- Greet the user once the form is submitted. -->
        <div class="greet">
            <p class="message">
                <?php
                if ($fullName !== "") {
                    echo "Hello $fullName!";
                }
                ?>
            </p>
        </div>
        <!-- Display Uploaded Image. -->
        <div>
            <div class="displayImage">
                <p>Uploaded Image:</p>
                <img src="<?php echo $targetFile; ?>" alt="Uploaded Image">
                <p><?php echo $displayName; ?></p>
            </div>
        </div>
    </div>
</body>

</html>
