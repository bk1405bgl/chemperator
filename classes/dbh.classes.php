<?php
class Dbh
{
    protected function connect() {
        try {
            $username = "bilal";
            $password = "rassenperri";
            $dbh = new PDO('mysql:host=localhost;dbname=chemperator', $username, $password);
            return $dbh;
        } catch(PDOException $e) {
            print "Connection failed: " . $e->getMessage() . "<br/>";
            die();
        }
    }
}