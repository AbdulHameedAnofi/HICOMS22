<?php

require_once($_SERVER['DOCUMENT_ROOT'] . '/HICOMS/controllers/PinController.php');

    $generatePin = new PinController;
    $generatePin->generatePin($_POST['generate']);


?>

