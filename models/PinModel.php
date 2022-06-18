<?php

include_once(__DIR__ . '/../Connection.php');

class PinModel {

//inserting generated pin into the database
    protected function insertPin($code, $serial_no) {
        $sql = 'INSERT INTO pin_gen (pin, serial_number) VALUES (?, ?)';
        $stmt = connection()->prepare($sql);
        $stmt->execute([$code, $serial_no]);
    }

//returns pin status
    public function pinStatus($code) {
        $sql = 'SELECT * FROM pin_gen WHERE pin = ? LIMIT 1';
        $stmt = connection()->prepare($sql);
        $stmt->execute([$code]);
        return $stmt->fetchAll(PDO::FETCH_ASSOC)[0]['status'];
    }

//deactivate pin
    public function deactivatePin($code, $pinDeactivate = 'inactive') {
        $sql = 'UPDATE pin_gen SET status = ? WHERE pin = ?';
        $stmt = connection()->prepare($sql);
        $stmt->execute([$pinDeactivate, $code]);
    }
}