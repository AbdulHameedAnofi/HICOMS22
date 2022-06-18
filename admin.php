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
    </header>

    <div class="form">
        <h3>Admin</h3>
            <?php
            
            $url = "http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";

            if (strpos($url, 'admin=invalid') == true) {
                echo "<p class='error'>Please input admin details correctly</p>";
            }

            ?>
        <form action=<?php echo htmlspecialchars($_SERVER['PHP_SELF']) ?> method="POST">
            <input type="text" name="name" placeholder="admin name"><br><br>
            <input type="password" name="password" placeholder="password"><br><br>
            <input class="submit" type="submit" name="submit" value="Submit">
        </form>
        <?php

        include_once ('controllers/AdminController.php');

        if (isset($_POST['submit'])) {
            $admin = new AdminController;
            $admin->checkAdmin($_POST['name'], $_POST['password']);
        }

        ?>
    </div>
</body>
</html>