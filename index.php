<?php
session_start()
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Hicoms</title>
</head>
<body>
    <header class="header">
        <div class="logo">
            HICOMS
        </div>
        <a href="admin.php">Admin</a>
    </header>

    <form class="form" action="views/PinView.php" method="post">
        <h3>Verify</h3>
        <?php

        $filePath = "http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";

        if (strpos($filePath, 'register=success') == true) {
            echo "<p class='success'>You've successfuly registered</p>";
        } 
        if (strpos($filePath, 'verify=invalid') == true) {
            echo "<p class='error'>Please input a valid verification code to continue</p>";
        }
        
        ?>
        <label for="code">Verification Code</label><br>

        <input type="text" name="code" placeholder="input your verification code"><br><br>
        <input class="submit" type="submit" name="submit" value="Submit">
        
    </form>
</body>
</html>