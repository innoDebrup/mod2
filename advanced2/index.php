<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Input</title>
    <link rel="stylesheet" href="./styles/style.css" type="text/css">
</head>
<body>
    <div class="container">
        <form action="email.php" method="post" enctype="multipart/form-data">
            <label for="email">Email: </label>
            <input type="email" name="email" placeholder="Enter your email here.">
            <input type="submit" name="submit" value="Submit">
        </form>
    </div>
</body>
</html>