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
    users_email TINYTEXT NOT NULL,
    isActive TINYINT NOT NULL DEFAULT 0,
);
```
Auch hier kann die Tabelle in der Datenbank anders benannt werden. Dafür müssen die SQL Abfragen angepasst werden.

### Eine weitere Datei erstellen

Erstellen Sie im root Verzeichnis eine config.php Datei mit folgendem Inhalt:

```
<?php
// config.php

$dbUsername = "IhrBenutzername";
$dbPassword = "IhrPasswort";
$dbHost = "localhost";
$dbName = "IhreDatenbank";
```