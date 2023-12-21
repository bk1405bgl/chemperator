# Chemperator

## Anleitung

### Datenbank

Entweder in der phpMyAdmin Oberfläche manuell eine Datenbank erstellen, dessen Name 'chemperator' ist und der Zeichensatz 'utf8mb4_unicode_ci' ist, oder den Befehl im Tab 'SQL' ausführen:

`CREATE DATABASE IF NOT EXISTS chemperator CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci;`

Anschließend bitte im root eine config.php erstellen, welche wie folgt aussieht:

```
<?php

$dbUsername = "username";
$dbPassword = "password";
$dbHost = "localhost";
$dbName = "dbname";

```

Die DB wird dabei höchstwahrscheinlich "chemperator" heißen, wenn Sie die obigen Anleitung befolgen.

Bei Rückfragen bitte einfach melden.