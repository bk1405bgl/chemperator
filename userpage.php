<?php
    session_start();

    if (!isset($_SESSION["userid"])) {
        header("Location: ../index.php?error=notloggedin");
        exit();
    }
?>
<?php include '../includes/00.inc.php'; ?>
    <title>Chemperator | Profilseite</title>
<?php include '../includes/01.inc.php'; ?>
<?php include '../includes/02.inc.php'; ?>
<main>
<div>
    <a href="products.php">Hier geht es zu den Produkten!</a>
</div>
<?php include '../includes/99.inc.php'; ?>