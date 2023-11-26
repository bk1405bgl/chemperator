# Chemperator

## Anleitung

### Datenbank

Importieren Sie die Datei `chemperator.sql` in Ihre Datenbank.

### Umgebungsvariablen einpflegen

Erstellen Sie im root Verzeichnis eine config.php Datei mit folgendem Inhalt:

```
<?php

$dbUsername = "IhrBenutzername";
$dbPassword = "IhrPasswort";
$dbHost = "localhost";
$dbName = "IhreDatenbank";
```

Die Werte zwischen den doppelten Anführungszeichen müssen Sie an Ihre Umgebung anpassen.