<?php
include_once(__DIR__ . '/../controllers/RegisterController.php');


$validateUserInput = new RegisterController($_POST['name'], $_POST['email'], $_POST['phone_number'], $_POST['gender'], $_POST['institution'], $_POST['course'], $_POST['level']);
$validateUserInput->validate();

?>