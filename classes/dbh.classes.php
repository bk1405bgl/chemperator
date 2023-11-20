<?php
include_once("../config.php");

class Dbh
{
    protected function connect() {
        global $dbHost, $dbName, $dbUsername, $dbPassword;
        try {
            $dbh = new PDO("mysql:host=$dbHost;dbname=$dbName", $dbUsername, $dbPassword);
            $dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            return $dbh;
        } catch(PDOException $e) {
            print "Connection failed: " . $e->getMessage() . "<br/>";
            die();
        }
    }

    public function getDbConnection() {
        return $this->connect();
    }
}
