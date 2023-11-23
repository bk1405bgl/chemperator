# Chemperator

## Anleitung

### Erstellen Sie eine Datenbank:

`CREATE DATABASE chemperator;`

Wahlweise kann die Datenbank anders benannt werden, dann sollte der Wert an den jeweiligen Stellen angepasst werden. Wo das genau im Code ist, könnt Ihr anhand einer guten IDE (ich empfehle [PHPStorm](https://www.jetbrains.com/phpstorm/)) durch die Suchfunktion herausfinden.

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

$dbUsername = "IhrBenutzername";
$dbPassword = "IhrPasswort";
$dbHost = "localhost";
$dbName = "IhreDatenbank";
```

Die Werte solltet Ihr an Eure Umgebung anpassen.