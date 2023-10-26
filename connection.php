<?php
    try {
        $conn = new PDO('mysql:host=localhost;dbname=chemperator', $user, $pass, array(
            PDO::ATTR_PERSISTENT => true
        ));
    } catch (PDOException $e) {
        // Ausgabe Fehlermeldung
    }