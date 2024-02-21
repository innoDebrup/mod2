<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Basic Assignment 1</title>
    <style>
        form{
            width: 400px;
            margin: 0 auto;
            input{
                display: inline-block;
                margin: 20px 0 10px 3px;
            }
        }
        #fullname{
            color: black;
        }
    </style>
</head>
<body>
    <!-- php to handle post -->
    <?php
        $fullname ="";
        if($_SERVER["REQUEST_METHOD"] == "POST"){
            $fullname = $_POST["firstname"] . " " . $_POST["lastname"];//. $_POST["lastname"];
        }
    ?>
    <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
        <fieldset>

            <legend>Personal Details</legend>
            
            <!-- first name input field -->
            <label for="firstname">First Name: </label>
            <input type="text" name = "firstname" placeholder="Enter your first name" oninput = update() id = "fname">
            <br>
            <!-- last name input field -->
            <label for="lastname">Last Name: </label>
            <input type="text" name = "lastname" placeholder="Enter your last name" oninput = update() id = "lname">
            <br>
            <!-- full-name input field. (Disabled/Non-editable)-->
            <label for="fullname">Full Name: </label>
            <input type="text" name = "fullname" id = "fullname" disabled></p>

            <!-- submit button -->
            <input type="submit" value="submit" name="submit">

        </fieldset>
    </form>
    <?php 
        if ($fullname !== " "){echo "<h1>Hello, $fullname</h1>";}
        
    ?>
    <script>
        const fname = document.querySelector("#fname");
        const lname = document.querySelector("#lname");
        const fullname = document.querySelector("#fullname");
        

        const update = function(){
            fullname.value = `${fname.value} ${lname.value}`;
        }
    </script>
    
</body>
</html>