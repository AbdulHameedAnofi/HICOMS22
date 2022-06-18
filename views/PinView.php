<?php

include_once(__DIR__ . '/../controllers/PinController.php');


    $new = new PinController;
    $new->checkPin($_POST['code']);

?>