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

    <!-- PHP to handle Post. -->
    <?php
    $fullName = " ";
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $fullName = $_POST["firstName"] . " " . $_POST["lastName"];
    }
    ?>
    <!-- Main Form -->
    <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
        <fieldset>

            <legend>Personal Details</legend>

            <!-- First-name input field. -->
            <label for="firstName">First Name: </label>
            <input type="text" name="firstName" placeholder="Enter your first name" oninput=update() id="fname">
            <!-- Last-name input field. -->
            <label for="lastName">Last Name: </label>
            <input type="text" name="lastName" placeholder="Enter your last name" oninput=update() id="lname">
            <!-- Full-name input field (Disabled/Non-editable). -->
            <label for="fullName">Full Name: </label>
            <input type="text" name="fullName" id="fullName" disabled></p>
            <!-- Submit button. -->
            <input type="submit" value="submit" name="submit">

        </fieldset>
    </form>
    <!-- Greet the user once the form is submitted. -->
    <h1>
        <?php
        if ($fullName !== " ") {
            echo "Hello $fullName!";
        }
        ?>
    </h1>
    <!-- Include the greet  -->
    <script src="script.js"></script>

</body>

</html>
