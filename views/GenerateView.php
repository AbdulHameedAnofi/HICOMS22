<?php

include_once(__DIR__ . '/../controllers/PinController.php');

    $generatePin = new PinController;
    $generatePin->generatePin($_POST['generate']);


?>

