<?php
    session_start();
?>
<!DOCTYPE html>
<html lang="de">
<head>
    <meta charset="utf-8">
    <title>Chemperator</title>
    <meta name="description" content="Chemperator ERP System for chemical industry businesses">
    <meta name="author" content="Bilal Kuzey">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="assets/css/reset.css">
    <link rel="stylesheet" href="assets/css/styles.css">
    <link rel="stylesheet" href="assets/css/modal.css">
</head>
<body>
    <div>
        <nav>
            <ul>
                <li><a href="/">Home</a></li>
                <?php
                    if(isset($_SESSION["user_id"])) {
                ?>
                <li><a href="#"><?php echo $_SESSION["user_uid"]; ?></a></li>
                <li><a href="includes/logout.inc.php">Logout</a></li>
                <?php
                    } else {
                        ?>
                        <li><button type="button" onclick="openModal('modal1')">Registrieren</button></li>
                        <li><button type="button" onclick="openModal('modal2')">Einloggen</button></li>
                <?php } ?>
            </ul>
        </nav>
        <main>
            <h1>Chemperator</h1>
            <p>Chemperator ist eine ERP-Software, speziell für Firmen in der Chemiebranche.</p>
            <div id="modal1" class="modal">
                <div class="modal-content">
                    <span class="close" onclick="closeModal('modal1')">&times;</span>
                    <form action="includes/signup.inc.php" method="post">
                        <div class="container">
                            <fieldset name="register" form="register">
                                <legend>Registrieren</legend>
                                <p>Bitte füllen Sie die untenstehenden Felder aus.</p>
                                <hr>
                                <label>Username</label>
                                <input type="text" placeholder="username" name="uid">
                                <label>Passwort</label>
                                <input type="password" placeholder="********" name="pwd" required>
                                <label>Passwort wiederholen</label>
                                <input type="password" placeholder="********" name="pwd_repeat" required>
                                <label>E-Mail</label>
                                <input type="email" placeholder="max@mustermann.de" name="email" required>
                                <button type="submit" name="submit">Registrieren</button>
                                <button type="reset" name="reset">Zurücksetzen</button>
                            </fieldset>
                        </div>
                    </form>
                </div>
            </div>
            <div id="modal2" class="modal">
                <div class="modal-content">
                    <span class="close" onclick="closeModal('modal2')">&times;</span>
                    <form action="includes/login.inc.php" method="post">
                        <div class="container">
                            <fieldset name="login" form="login">
                                <legend>Einloggen</legend>
                                <p>Bitte füllen Sie die untenstehenden Felder aus.</p>
                                <hr>
                                <label>Username</label>
                                <input type="text" placeholder="Username eingeben" name="uid" required>
                                <label>Passwort</label>
                                <input type="password" placeholder="Passwort eingeben" name="pwd" required>
                                <button type="submit" name="submit">Einloggen</button>
                                <button type="reset" name="reset">Zurücksetzen</button>
                            </fieldset>
                        </div>
                    </form>
                </div>
            </div>
        </main>
        <footer>
            <div>
                <p>Chemperator &copy;<?= date("Y");?></p>
            </div>
        </footer>
    </div>
    <script src="assets/js/modals.js"></script>
</body>
</html>