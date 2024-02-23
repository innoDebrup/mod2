<?php
require "upload.php";
$fullName = "";
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $fullName = $_POST["firstName"] . " " . $_POST["lastName"];
}
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
    <div style="display: <?php echo ($uploadOk === 0) ? "block" : "none"; ?>;">
        <div class="errorCon">
            <p><?php echo $errorMessage; ?></p>
        </div>
    </div>
</body>

</html>