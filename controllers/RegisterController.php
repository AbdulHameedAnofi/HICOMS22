<?php

session_start();
include_once($_SERVER['DOCUMENT_ROOT'] . '/HICOMS/models//UserModel.php');

class RegisterController extends UserModel {
    private $name;
    private $email;
    private $phone_number;
    private $gender;
    private $institution;
    private $course;
    private $level;

    public function __construct($name, $email, $phone_number, $gender, $institution, $course, $level) {
        $this->name         = $name;
        $this->email        = $email;
        $this->phone_number = $phone_number;
        $this->gender       = $gender;
        $this->institution  = $institution;
        $this->course       = $course;
        $this->level        = $level;
    }

    public function validate() {
        if (empty($this->name) or empty($this->phone_number) or empty($this->gender) or empty($this->institution) or empty($this->course) or empty($this->level)) {
            header('location: ../register.php?register=empty');
            exit();
        }

        elseif (!filter_var($this->email, FILTER_VALIDATE_EMAIL)) {
            header('location: ../register.php?register=invalidEmail');
            exit();
        }

        elseif (strlen($this->phone_number) !== 11) {
            header('location: ../register.php?register=invalidPhoneNumber');
            exit();
        }

        elseif ($this->emailAvailabilityCheck > 0) {
            header('location: ../register.php?register=emailTaken');
            exit();
        }

        else {
            $this->createUser($this->name, $this->email, $this->phone_number, $this->gender, $this->institution, $this->course, $this->level);
            session_unset();
            header('location: ../index.php?register=success');
            exit();
        }
    }
}