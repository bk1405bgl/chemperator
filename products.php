<?php
session_start();

if (!isset($_SESSION["userid"])) {
    header("Location: ../index.php?error=notloggedin");
    exit();
}
include_once("../classes/dbh.classes.php");

$dbh = new Dbh();
$conn = $dbh->getDbConnection();

$sql = "SELECT * FROM artikel";
$stmt = $conn->prepare($sql);
$stmt->execute();

$produkte = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>
<?php include '../includes/00.inc.php'; ?>
    <title>Chemperator | Produkte</title>
<?php include '../includes/01.inc.php'; ?>
<?php include '../includes/02.inc.php'; ?>
<main>
    <h1>Produkte</h1>
    <table>
        <tr>
            <th>Company</th>
            <th>Contact</th>
            <th>Country</th>
        </tr>
        <tr>
            <td>Alfreds Futterkiste</td>
            <td>Maria Anders</td>
            <td>Germany</td>
        </tr>
        <tr>
            <td>Berglunds snabbköp</td>
            <td>Christina Berglund</td>
            <td>Sweden</td>
        </tr>
        <tr>
            <td>Centro comercial Moctezuma</td>
            <td>Francisco Chang</td>
            <td>Mexico</td>
        </tr>
        <tr>
            <td>Ernst Handel</td>
            <td>Roland Mendel</td>
            <td>Austria</td>
        </tr>
        <tr>
            <td>Island Trading</td>
            <td>Helen Bennett</td>
            <td>UK</td>
        </tr>
        <tr>
            <td>Königlich Essen</td>
            <td>Philip Cramer</td>
            <td>Germany</td>
        </tr>
        <tr>
            <td>Laughing Bacchus Winecellars</td>
            <td>Yoshi Tannamuri</td>
            <td>Canada</td>
        </tr>
        <tr>
            <td>Magazzini Alimentari Riuniti</td>
            <td>Giovanni Rovelli</td>
            <td>Italy</td>
        </tr>
        <tr>
            <td>North/South</td>
            <td>Simon Crowther</td>
            <td>UK</td>
        </tr>
        <tr>
            <td>Paris spécialités</td>
            <td>Marie Bertrand</td>
            <td>France</td>
        </tr>
    </table>
    <?php foreach ($produkte as $produkt): ?>
        <div>
            <h2>Name: <?= $produkt['product_name']; ?></h2>
            <p>Kurzbeschreibung: <?= $produkt['product_shortD']; ?></p>
            <div>Beschreibung: <?= $produkt['product_description']; ?></div>
            <div>Kategorie: <?= $produkt['product_catId']; ?></div>
            <div>Steuerklasse: <?= $produkt['product_taxId']; ?></div>
            <div>Nettopreis: <?= $produkt['product_priceN']; ?></div>
            <div>Bruttopreis: <?= $produkt['product_priceB']; ?></div>
            <div>Bestand: <?= $produkt['product_stock']; ?></div>
            <div>Bewertungen: <?= $produkt['product_reviews']; ?></div>
        </div>
    <?php endforeach; ?>
    <!-- Hier können Sie weiteren HTML-Code einfügen -->
</main>
<?php include '../includes/99.inc.php'; ?>