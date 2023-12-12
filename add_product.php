<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);
session_start();

if (!isset($_SESSION["userid"])) {
    header("Location: /index.php?error=notloggedin");
    exit();
}
?>
<?php include 'includes/00.inc.php'; ?>
    <title>Chemperator | Produkt hinzufügen</title>
<?php include 'includes/01.inc.php'; ?>
<?php include 'includes/02.inc.php'; ?>
    <main>
<?php
include_once("classes/dbh.classes.php");
$dbh = new Dbh();
$conn = $dbh->getDbConnection();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST['name'];
    $Artikelnummer = $_POST['Artikelnummer'];
    $Kurzbeschreibung = $_POST['Kurzbeschreibung'];
    $LangeBeschreibung = $_POST['LangeBeschreibung'];
    $Nettopreis = $_POST['Nettopreis'];
    $Steuerklasse = $_POST['Steuerklasse'];

    $sql = "INSERT INTO Artikel (Name, Artikelnummer, Kurzbeschreibung, LangeBeschreibung, Nettopreis, Steuerklasse)
    VALUES (:name, :Artikelnummer, :Kurzbeschreibung, :LangeBeschreibung, :Nettopreis, :Steuerklasse)";
$stmt = $conn->prepare($sql);

    if ($stmt->execute([
        ':name' => $name,
        ':Artikelnummer' => $Artikelnummer,
        ':Kurzbeschreibung' => $Kurzbeschreibung,
        ':LangeBeschreibung' => $LangeBeschreibung,
        ':Nettopreis' => $Nettopreis,
        ':Steuerklasse' => $Steuerklasse,
    ])) {
        header("Location: products.php");
    }
}
?>
        <form action="add_product.php" method="post">
            <label for="name">Name:</label>
            <input type="text" id="name" name="name">
            <label for="Artikelnummer">Artikelnummer:</label>
            <input type="text" id="Artikelnummer" name="Artikelnummer">
            <label for="Kurzbeschreibung">Kurzbeschreibung:</label>
            <textarea id="Kurzbeschreibung" name="Kurzbeschreibung"></textarea>
            <label for="LangeBeschreibung">LangeBeschreibung:</label>
            <textarea id="LangeBeschreibung" name="LangeBeschreibung"></textarea>
            <label for="Nettopreis">Nettopreis:</label>
            <input type="number" id="Nettopreis" name="Nettopreis">
            <label for="Steuerklasse">Steuerklasse:</label>
            <input type="number" id="Steuerklasse" name="Steuerklasse">
            <input type="submit" value="Artikel hinzufügen">
        </form>
    </main>
<?php include_once 'includes/99.inc.php'; ?>
