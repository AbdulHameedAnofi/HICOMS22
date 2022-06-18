<?php

session_start();

include_once(__DIR__ . '/../models/PinModel.php');

class PinController extends PinModel {

    private $input;

//generates codes
    public function generatePin($length) {
        $characters = "0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ";
        for ($i=0; $i < $length; $i++) { 
            $code = substr(str_shuffle($characters), 0, 12);
            $serial = uniqid();
            $this->insertPin($code, $serial);
            echo $code.'<br>';
        }
    }

//validates the code input
    public function checkPin($code) {
        $inputPin = $this->pinStatus($code);
        if ($inputPin == 'active') {
            $_SESSION['verification_code'] = $code;
            $this->deactivatePin($code);
            header('location: ../register.php');
            exit();
        }
        else {
            header('location: ../index.php?verify=invalid');
            exit();
        }
    }
};