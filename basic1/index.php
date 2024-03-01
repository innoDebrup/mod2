<?php
$fullName = "";
$re = '/^[a-z]+$/i';
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
    <title>Basic Assignment 1</title>

    <!-- Linked external CSS file. -->
    <link rel="stylesheet" href="./styles/style.css" type="text/css">

</head>

<body>
    <!-- Main Form. -->
    <div class="form">
        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
            <fieldset>
                <legend>Personal Details</legend>
                <!-- First-name input field. -->
                <label for="firstName">First Name: </label>
                <input type="text" name="firstName" pattern="[A-Za-z]+" placeholder="Enter your first name" oninput=update() id="firstName" required>
                <!-- Last-name input field. -->
                <label for="lastName">Last Name: </label>
                <input type="text" name="lastName" pattern="[A-Za-z]+" placeholder="Enter your last name" oninput=update() id="lastName" required>
                <!-- Full-name input field (Disabled/Non-editable). -->
                <label for="fullName">Full Name: </label>
                <input type="text" name="fullName" id="fullName" disabled>
                <!-- Submit button. -->
                <input type="submit" value="submit" name="submit">
            </fieldset>
        </form>
    </div>
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
    <!-- Include the script.  -->
    <script src="./scripts/script.js"></script>
</body>

</html>
