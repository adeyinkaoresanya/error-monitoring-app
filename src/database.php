<?php
// src/database.php

class Database {
    private $host = 'localhost';
    private $db_name = 'test_db';
    private $username = 'root';
    private $password = 'wrong_password'; // Intentionally wrong password
    private $conn;

    public function connect() {
        $this->conn = null;
        try {
            $this->conn = new PDO("mysql:host=" . $this->host . ";dbname=" . $this->db_name, $this->username, $this->password);
            $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch(PDOException $e) {
            trigger_error("Database Connection Failed: " . $e->getMessage(), E_USER_ERROR);
        }
        return $this->conn;
    }
}