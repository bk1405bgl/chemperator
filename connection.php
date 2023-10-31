<?php
    mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);
    try {
    $mysqli = new mysqli("localhost", "bilal", "rassenperri", "chemperator");
    $mysqli->set_charset("utf8mb4");
    } catch(Exception $e) {
    error_log($e->getMessage());
    exit('Es konnte keine Verbindung zur Datenbank hergestellt werden.');
    }
