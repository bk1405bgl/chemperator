<?php
require_once(__DIR__ . "/../config.php");
class Dbh
{
    protected function connect() {
        try {
            global $dbHost, $dbName, $dbUsername, $dbPassword;
            $dbh = new PDO("mysql:host=$dbHost;dbname=$dbName;charset=utf8", $dbUsername, $dbPassword);
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