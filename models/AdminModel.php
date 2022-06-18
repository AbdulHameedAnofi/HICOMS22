<?php

include_once(__DIR__ . '/../Connection.php');
session_start();

class AdminModel {
    public function createAdmin($name, $password) {
        $sql = 'INSERT INTO admin (admin_name, password) VALUES (?, ?)';
        $stmt = connection()->prepare($sql);
        $stmt->execute([$name, $password]);
    }

    public function authenticateAdmin($name) {
        $sql = 'SELECT * FROM admin WHERE admin_name = ? LIMIT 1';
        $stmt = connection()->prepare($sql);
        $stmt->execute([$name]);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
}