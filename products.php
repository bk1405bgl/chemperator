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

    $sql = "SELECT * FROM Artikel";
    $stmt = $conn->prepare($sql);
    $stmt->execute();

    $produkte = $stmt->fetchAll(PDO::FETCH_ASSOC);
    ?>
    <h1>Produkte</h1>
    <table role="table">
        <thead role="rowgroup">
            <tr role="row">
                <th role="columnheader">SKU</th>
                <th role="columnheader">Artikel</th>
                <th role="columnheader">Kurzbeschreibung</th>
                <th role="columnheader">Beschreibung</th>
                <th role="columnheader">Nettopreis</th>
                <th role="columnheader">Bruttopreis</th>
                <th role="columnheader">Steuerklasse</th>
                <th role="columnheader">Aktionen</th>
            </tr>
        </thead>
    <?php foreach ($produkte as $produkt): ?>

        <tr role="row">
            <td role="cell"><?= $produkt['Artikelnummer']; ?></td>
            <td role="cell"><?= $produkt['Name']; ?></td>
            <td role="cell"><?= $produkt['Kurzbeschreibung']; ?></td>
            <td role="cell"><?= $produkt['LangeBeschreibung']; ?></td>
            <td role="cell" class="right"><?= $produkt['Nettopreis'] . ' €'; ?></td>
            <td role="cell" class="right"><?= round($produkt['Nettopreis']*1.19, 2) . ' €'; ?></td>
            <td role="cell"><?= $produkt['Steuerklasse']; ?></td>
            <td role="cell">
                <div>
                <form action="edit_product.php" method="post">
                    <input type="hidden" name="id" value="<?php echo $produkt['ArtikelID']; ?>">
                    <button type="submit"><i class="fa-solid fa-pen-to-square"></i></button>
                </form>

                <form action="delete_product.php" method="post">
                    <input type="hidden" name="id" value="<?php echo $produkt['ArtikelID']; ?>">
                    <button type="submit" onclick="return confirm('Bist du sicher das du die Daten löschen möchtest?');"><i class="fa-solid fa-trash"></i></button>
                </form>
                </div>
            </td>
        </tr>
    <?php endforeach; ?>
    </table>
</main>
<?php include_once 'includes/99.inc.php'; ?>