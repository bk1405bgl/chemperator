<?php
    session_start();
    if (!isset($_SESSION["userid"])) {
        header("Location: /index.php?error=notloggedin");
        exit();
    }
?>
<?php include 'includes/00.inc.php'; ?>
    <title>Chemperator | Profilseite</title>
<?php include 'includes/01.inc.php'; ?>
<?php include 'includes/02.inc.php'; ?>
<main>
    <h1>Profilseite</h1>
    <p class="greeting">Hallo <?php echo $_SESSION["useruid"]; ?>!</p>
    <div class="cardbox">
        <div class="card">
            <h2>Produkte</h2>
            <img src="assets/images/produkte.png" alt="Produkte">
            <p>Verwalten Sie Ihre Produkte.</p>
            <a href="products.php">Hier geht es zu den Produkten!</a>
        </div>
        <div class="card">
            <h2>Produkte</h2>
            <img src="assets/images/produkte.png" alt="Produkte">
            <p>Verwalten Sie Ihre Produkte.</p>
            <a href="products.php">Hier geht es zu den Produkten!</a>
        </div>
        <div class="card">
            <h2>Produkte</h2>
            <img src="assets/images/produkte.png" alt="Produkte">
            <p>Verwalten Sie Ihre Produkte.</p>
            <a href="products.php">Hier geht es zu den Produkten!</a>
        </div>
    </div>
<?php include 'includes/99.inc.php'; ?>