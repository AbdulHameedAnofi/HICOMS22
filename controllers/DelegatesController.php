<?php

include_once($_SERVER['DOCUMENT_ROOT'] . '/HICOMS/models/UserModel.php');

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