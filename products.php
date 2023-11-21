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
    <table role="table">
        <thead role="rowgroup">
            <tr role="row">
                <th role="columnheader">Name</th>
                <th role="columnheader">Kurzbeschreibung</th>
                <th role="columnheader">Kategorie</th>
                <th role="columnheader">Steuerklasse</th>
                <th role="columnheader">Nettopreis</th>
                <th role="columnheader">Bruttopreis</th>
                <th role="columnheader">Bestand</th>
                <th role="columnheader">Bewertungen</th>
                <th role="columnheader">Aktionen</th>
            </tr>
        </thead>
    <?php foreach ($produkte as $produkt): ?>

        <tr role="row">
            <td role="cell"><?= $produkt['product_name']; ?></td>
            <td role="cell"><?= $produkt['product_shortD']; ?></td>
            <td role="cell"><?= $produkt['product_catId']; ?></td>
            <td role="cell"><?= $produkt['product_taxId']; ?></td>
            <td role="cell"><?= $produkt['product_priceN']; ?></td>
            <td role="cell"><?= $produkt['product_priceB']; ?></td>
            <td role="cell"><?= $produkt['product_stock']; ?></td>
            <td role="cell"><?= $produkt['product_reviews']; ?></td>
            <td role="cell">Bearbeiten</td>
        </tr>
    <?php endforeach; ?>
    </table>
</main>
<?php include 'includes/99.inc.php'; ?>