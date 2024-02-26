<?php
require "upload.php";
$fullName = $marksInput = "";
$marksArray = $marksFinal = [];
$re = '/^[a-z]+[ ]*\|[ ]*[0-9]{1,3}$/i';    //Regex for validating Input Format of Marks.

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $fullName = $_POST["firstName"] . " " . $_POST["lastName"];
    $marksInput = $_POST["marks"];
    $marksArray = explode("\n", $marksInput);   //Exploding the string to form a string array. Point of exploding is a newline character.
    $n = count($marksArray);
    for ($i = 0; $i < $n; $i++) {
        $marksArray[$i] = trim($marksArray[$i]);    //Trimming any whitespaces at the beginning and end of the string.
        $marksArray[$i] = preg_replace('/[ ]/', '', $marksArray[$i]);   //Cleaning up spaces in the string.
        //----------Delete any string that does not match the given format.---------
        if (!preg_match($re, $marksArray[$i])) {
            unset($marksArray[$i]);
        }
        //--------------------------------------------------------------------------
    }
    $marksArray = array_values($marksArray);
    foreach ($marksArray as $x) {
        array_push($marksFinal, explode("|", $x));  //The marksFinal is an array of string arrays, where each string array consists a subject name at 0th index and the marks at the 1st index.
    }
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
</body>

</html>