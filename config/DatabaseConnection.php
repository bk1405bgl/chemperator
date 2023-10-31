<?php
    class DatabaseConnection {
        public function __construct() {
            $conn = new mysqli(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_NAME);
            if ($conn->connect_error) {
                die("<h2>Connection failed: " . $conn->connect_error . "</h2>");
            }
            return $this->conn = $conn;
        }
    }