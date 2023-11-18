<?php
include_once("../config.php");
class Dbh
{
    protected function connect() {
        try {
            $dbh = new PDO('mysql:host=$host;dbname=$dbname', $username, $password);
            $dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            return $dbh;
        } catch(PDOException $e) {
            print "Connection failed: " . $e->getMessage() . "<br/>";
            die();
        }
    }
}
