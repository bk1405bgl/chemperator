# Chemperator

## Anleitung

### Erstellen Sie eine Datenbank:

`CREATE DATABASE chemperator;`

Wahlweise kann die Datenbank anders benannt werden, dann sollte der Wert an der jeweiligen Stelle angepasst werden. Siehe weiter unten...

```
CREATE TABLE users (
    users_id int(11) AUTO_INCREMENT PRIMARY KEY NOT NULL,
    users_uid TINYTEXT NOT NULL,
    users_pwd LONGTEXT NOT NULL,
    users_email TINYTEXT NOT NULL
);
```
Auch hier kann die Tabelle in der Datenbank anders benannt werden. Dafür müssen die SQL Abfragen angepasst werden.

### Eine weitere Datei erstellen

Erstellen Sie im Ordner /classes/ eine weitere Datei mit dem Namen: 
dbh.classes.php

Dateiinhalt:
```
<?php
class Dbh
{
    protected function connect() {
        try {
            $username = {your username};
            $password = {your password};
            $dbh = new PDO('mysql:host={localhost};dbname={chemperator}', $username, $password);
            return $dbh;
        } catch(PDOException $e) {
            print "Connection failed: " . $e->getMessage() . "<br/>";
            die();
        }
    }
}
```
In Zeile 6 username durch Ihren ersetzen.

In Zeile 7 password durch Ihres ersetzen.

In Zeile 8 host und Datenbankname ersetzen, so wie es in Ihrem System ist.

Und bitte entfernen Sie auch die geschweiften Klammern. Danke.