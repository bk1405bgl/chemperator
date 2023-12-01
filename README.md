# Chemperator

## Anleitung

### Datenbank

Entweder in der phpMyAdmin Oberfläche manuell eine Datenbank erstellen, dessen Name 'chemperator' ist und der Zeichensatz 'utf8mb4_unicode_ci' ist, oder den Befehl im Tab 'SQL' ausführen:

`CREATE DATABASE IF NOT EXISTS chemperator CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci;`

Danach, um den Prozess einfach zu halten, erscheint unser Konfigurations-Assistent für das Setzen der globalen Einstellungen der Datenbank (Benutzername, Passwort, Host und Datenbankname). Diese Informationen werden in der Datei `config.php` gespeichert.

Importieren Sie die Datei `chemperator.sql` in Ihre Datenbank.