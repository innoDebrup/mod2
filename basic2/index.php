<?php
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
    <title>Basic Assignment 1</title>

    <!--  Linked external CSS file. -->
    <link rel="stylesheet" href="style.css" type="text/css">

</head>

<body>
    <!-- Main Form. -->
    <div class="form">
        <form action="result.php" method="post" enctype="multipart/form-data">
            <fieldset>
                <legend>Personal Details</legend>
                <!-- First-name input field. -->
                <label for="firstName">First Name: </label>
                <input type="text" name="firstName" pattern="[A-Za-z]+" placeholder="Enter your first name" oninput=update() maxlength="20" id="fname">
                <!-- Last-name input field. -->
                <label for="lastName">Last Name: </label>
                <input type="text" name="lastName" pattern="[A-Za-z]+" placeholder="Enter your last name" oninput=update() maxlength="20" id="lname">
                <!-- Full-name input field (Disabled/Non-editable). -->
                <label for="fullName">Full Name: </label>
                <input type="text" name="fullName" id="fullName" disabled>
                <!-- Input the file to be uploaded. -->
                <label for="image">Choose an image file: </label>
                <input type="file" name="image" accept="image/*" required>
                <!-- Submit button. -->
                <input type="submit" value="submit" name="submit">
            </fieldset>
        </form>
    </div>
    
    <!-- Include the script.  -->
    <script src="script.js"></script>
</body>

</html>