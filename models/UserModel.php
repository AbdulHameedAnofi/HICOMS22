<?php

include_once($_SERVER['DOCUMENT_ROOT'] . '/HICOMS/Connection.php');


class UserModel {

//creating a user
    protected function createUser($name, $email, $phone_number, $gender, $institution, $course, $level) {
        $sql = "INSERT INTO Users (name, email, phone_number, gender, institution, course, level) VALUES (?, ?, ?, ?, ?, ?, ?)";
        $stmt = connection()->prepare($sql);
        $stmt->execute([$name, $email, $phone_number, $gender, $institution, $course, $level]);
    }

//checks if an email exists in the database    
    protected function emailAvailabilityCheck($email) {
        $sql = 'SELECT email FROM Users WHERE email = ?';
        $stmt = connection()->prepare($sql);
        $stmt->execute([$email]);
        return $stmt->rowCount();
    }

//getting all users data
    public function allDelegates() {
        $sql = "SELECT * FROM Users ORDER BY name ASC";
        $stmt = connection()->prepare($sql);
        $stmt->execute();
        $delegates = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $delegates;
    }

//searching for delegate
    public function delegates($name) {
        $sql = "SELECT * FROM Users WHERE name LIKE ? OR email LIKE ? OR phone_number LIKE ? ORDER BY name ASC";
        $stmt = connection()->prepare($sql);
        $stmt->execute(['%'.$name.'%', '%'.$name.'%', '%'.$name.'%']);
        $delegates = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $delegates;
    }
}