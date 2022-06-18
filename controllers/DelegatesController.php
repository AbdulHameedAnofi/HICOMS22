<?php

include_once(__DIR__ . '/../models/UserModel.php');

class DelegatesController extends UserModel {

//get delegates data from user model

    public function getAllDelegates() {
            return $this->allDelegates();
    }

    public function getDelegates($name) {
        if (!empty($name)) {
            return $this->delegates($name);
        }
        if (empty($name)) {
            return $this->allDelegates();
        }
    }
}