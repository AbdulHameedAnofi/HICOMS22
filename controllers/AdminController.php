<?php

include_once(__DIR__ . '/../models/AdminModel.php');



class AdminController extends AdminModel {
    public function createAnAdmin($name, $password) {
        $this->createAdmin($name, password_hash($password, PASSWORD_ARGON2ID));
        echo 'Account created';
    }

    public function checkAdmin($name, $password) {
        $admin = $this->authenticateAdmin($name);
        if (password_verify($password, $admin[0]['password'])) {
            $_SESSION['admin'] = $name;
            header('location: ./delegates.php');
            exit();
        }
        else {
            header('location: ./admin.php?admin=invalid');
            exit();
        }
    }
}