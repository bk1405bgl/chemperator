<?php
session_start();

if (!isset($_SESSION["userid"])) {
    header("Location: /index.php?error=notloggedin");
    exit();
}
?>
<?php include 'includes/00.inc.php'; ?>
    <title>Chemperator | Produkte</title>
<?php include 'includes/01.inc.php'; ?>
<?php include 'includes/02.inc.php'; ?>
<main>
    <?php

    include_once("classes/dbh.classes.php");

    $dbh = new Dbh();
    $conn = $dbh->getDbConnection();

    $sql = "SELECT * FROM artikel";
    $stmt = $conn->prepare($sql);
    $stmt->execute();

    $produkte = $stmt->fetchAll(PDO::FETCH_ASSOC);
    ?>
    <h1>Produkte</h1>
    <table>
        <tr>
            <th>Name</th>
            <th>Kurzbeschreibung</th>
            <th>Kategorie</th>
            <th>Steuerklasse</th>
            <th>Nettopreis</th>
            <th>Bruttopreis</th>
            <th>Bestand</th>
            <th>Bewertungen</th>
            <th>Aktionen</th>
        </tr>

    <?php foreach ($produkte as $produkt): ?>

        <tr>
            <td><?= $produkt['product_name']; ?></td>
            <td><?= $produkt['product_shortD']; ?></td>
            <td><?= $produkt['product_catId']; ?></td>
            <td><?= $produkt['product_taxId']; ?></td>
            <td><?= $produkt['product_priceN']; ?></td>
            <td><?= $produkt['product_priceB']; ?></td>
            <td><?= $produkt['product_stock']; ?></td>
            <td><?= $produkt['product_reviews']; ?></td>
            <td>Bearbeiten</td>
        </tr>
    <?php endforeach; ?>
    </table>
</main>
<?php include 'includes/99.inc.php'; ?>