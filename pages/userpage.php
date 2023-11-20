<?php
session_start();

if (!isset($_SESSION["userid"])) {
    header("Location: index.php");
    exit();
}

// Der Benutzer ist eingeloggt, fahren Sie mit dem Rest der Seite fort.
?>
<!-- Hier können Sie den Inhalt der Benutzerseite hinzufügen -->
Erfolgreich eingeloggt!