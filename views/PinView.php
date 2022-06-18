<?php

require_once('../controllers/PinController.php');


    $new = new PinController;
    $new->checkPin($_POST['code']);

?>