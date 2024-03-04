<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./styles/style.css" type="text/css">
    <title>Login Page</title>
</head>

<body>
    <!-- Login page. -->
    <div class="quest">
        <h1>Login</h1>
        <form action="main.php" method="post">
            <label for="username">UserName: </label>
            <input type="text" name="username" placeholder="Enter your username" required>
            <label for="password">Password: </label>
            <input type="password" name="password" placeholder="Enter your Password" required>
            <input type="submit" value="Login">
        </form>
    </div>
</body>

</html>
