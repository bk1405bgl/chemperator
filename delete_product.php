<?php
session_start();

if (!isset($_SESSION["userid"])) {
    header("Location: /index.php?error=notloggedin");
    exit();
}
?>
<?php include 'includes/00.inc.php'; ?>
    <title>Chemperator | Produkt löschen</title>
<?php include 'includes/01.inc.php'; ?>
<?php include 'includes/02.inc.php'; ?>
    <main>
<?php
include_once("classes/dbh.classes.php");
$dbh = new Dbh();
$conn = $dbh->getDbConnection();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Produkt-ID aus der POST-Anforderung abrufen
    $id_to_delete = $_POST['id'];

    // SQL-Abfrage vorbereiten
    $sql = "DELETE FROM Artikel WHERE Artikel.ArtikelID = :id";

    // SQL-Statement vorbereiten
    $statement = $conn->prepare($sql);

    // Parameter an das vorbereitete Statement binden und die SQL-Abfrage ausführen
    if ($statement->execute([':id' => $id_to_delete])) {
        // Erfolg: Weiterleiten zur Produktliste
        header("Location: products.php");
    }
}
?>