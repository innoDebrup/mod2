<?php
    session_start();
    if(!isset($_SESSION['username'])){
        header('Location: error.php');
        exit;
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css" type="text/css">
    <title>Welcome</title>
</head>
<body>
    <div>
        <div class="flexSpabet welcome">
            <div>
                <h1>Session Created</h1>
            </div>
            <div>
                <a href="logout.php">Logout</a>
            </div>
            
        </div>
        <div class="quest">
            <h2>Welcome <?php echo $_SESSION["username"]?></h2>
            <form action="pager.php" method="get">
                <label for="q">
                    Please select the question No. you want to visit: 
                </label>
                <input type="number" min="1" max="7" name="q">
                <input type="submit" value="Go">
            </form>
        </div>
        

    </div>
    
</body>
</html>