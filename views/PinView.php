<?php

include_once($_SERVER['DOCUMENT_ROOT'] . '/HICOMS/controllers/PinController.php');


    $new = new PinController;
    $new->checkPin($_POST['code']);

?>