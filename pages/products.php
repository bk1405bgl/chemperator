<?php
session_start();

if (!isset($_SESSION["userid"])) {
    header("Location: ../");
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
<!DOCTYPE html>
<html lang="de">
<head>
    <meta charset="utf-8">
    <title>Produkte</title>
    <!-- Weitere Meta-Tags und Stylesheets können hier eingefügt werden -->
</head>
<body>
    <h1>Produkte</h1>
    <?php foreach ($produkte as $produkt): ?>
        <div>
            <h2><?= $produkt['product_name']; ?></h2>
            <p><?= $produkt['product_shortD']; ?></p>
            <!-- Fügen Sie weitere Informationen hinzu, die Sie anzeigen möchten -->
        </div>
    <?php endforeach; ?>
    <!-- Hier können Sie weiteren HTML-Code einfügen -->
</body>
</html>
