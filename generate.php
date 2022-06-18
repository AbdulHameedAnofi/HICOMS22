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

    <form class="form" action=<?php echo htmlspecialchars($_SERVER['PHP_SELF']) ?> method="POST">
        <h3>Verification Code Generator</h3>
        <p style="font-size: small; color: rgb(55, 194, 55);">Note: Please copy codes before leaving this page</p> <br>
        <input type="text" name="generate" placeholder="Number of codes to generate"><br><br>
        <input class="submit" type="submit" name="submit" value="Generate">
    </form>

    <?php

include_once('controllers/PinController.php');

        if (isset($_POST['submit'])) {
            $generatePin = new PinController;
            echo $generatePin->generatePin($_POST['generate']);
        }

    ?>
</body>
</html>