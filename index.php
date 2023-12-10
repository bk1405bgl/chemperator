<?php
    session_start();
?>
<?php include 'includes/00.inc.php'; ?>
    <title>Chemperator</title>
    <?php include 'includes/01.inc.php'; ?>
    <?php include 'includes/02.inc.php'; ?>
    <?php
        if(isset($_GET["error"])) {
            $error = $_GET["error"];
            if ($error == "emptyinput") {
                echo '<p class="error-message">Bitte füllen Sie alle Felder aus.</p>';
            } elseif ($error == "wrongpassword") {
                echo '<p class="error-message">Falsches Passwort. Bitte versuchen Sie es erneut.</p>';
            } elseif ($error == "usernotfound") {
                echo '<p class="error-message">Benutzer nicht gefunden. Überprüfen Sie Ihre Anmeldeinformationen.</p>';
            } elseif ($error == "stmtfailed") {
                echo '<p class="error-message">Es gab ein Problem mit der Datenbank. Bitte versuchen Sie es später erneut.</p>';
            } elseif ($error == "accountnotactivated") {
                echo '<p class="error-message">Ihr Konto wurde noch nicht aktiviert. Bitte versuchen Sie es später erneut.</p>';
            } elseif ($error == "none") {
                echo '<p class="success-message">Sie haben sich erfolgreich eingeloggt.</p>';
            } elseif ($error == "notloggedin") {
                echo '<p class="error-message">Sie sind nicht eingeloggt.</p>';
            } elseif ($error == "registered") {
                echo '<p class="success-message">Sie haben sich erfolgreich registriert. Bitte warten Sie, bis Ihr Account freigeschaltet wird!</p>';
            }
        }
    ?>
    <main>
        <h1>Chemperator</h1>
        <p>Chemperator ist eine ERP-Software, speziell für Firmen in der Chemiebranche entwickelt.</p>
        <h2>Kundenverwaltung</h2>
        <p>Verwalten Sie Ihre Kunden und ziehen Sie Schlüsse aus Statistiken und Auswertungen. Bestimmen Sie Top-Kunden, gewähren Sie individuelle Rabatte und vieles mehr.</p>
        <h2>Artikelverwaltung</h2>
        <p>Artikel Auflistung, Detailbearbeitung, Preiskalkulation inklusiver direkter Abstammung aus den Rezepturen.</p>
        <h2>Rezepturverwaltung</h2>
        <p>Rezepturen bestehen aus Rohstoffen und können mehreren Produkten zugewiesen werden. Eine Rezeptur kann auch nur verdünnt einem Produkt zugewiesen werden.</p>
        <h2>Auftragsverwaltung</h2>
        <p>Rechnungen, Gutschriften, Lieferscheine, uvm. können hier verwaltet werden. Statistiken und Auswertungen können in beliebigen Konstellationen erstellt werden.</p>
        <div id="modal1" class="modal">
            <div class="modal-content">
                <span class="close" onclick="closeModal('modal1')"><i class="fa-solid fa-circle-xmark"></i></span>
                <form action="includes/signup.inc.php" method="post" autocomplete="off">
                    <div class="container">
                        <label>Username</label>
                        <input type="text" placeholder="username" name="uid">
                        <label>Passwort</label>
                        <input type="password" placeholder="********" name="pwd" required>
                        <label>Passwort wiederholen</label>
                        <input type="password" placeholder="********" name="pwd_repeat" required>
                        <label>E-Mail</label>
                        <input type="email" placeholder="max@mustermann.de" name="email" required>
                        <button type="submit" name="submit" title="Registrieren"><i class="fa-solid fa-user-plus">&nbsp;</i>Registrieren</button>
                        <button type="reset" name="reset" title="Zurücksetzen"><i class="fa-solid fa-delete-left"></i></button>
                    </div>
                </form>
            </div>
        </div>
        <div id="modal2" class="modal">
            <div class="modal-content">
                <span class="close" onclick="closeModal('modal2')"><i class="fa-solid fa-circle-xmark"></i></span>
                <form action="includes/login.inc.php" method="post" autocomplete="off">
                    <div class="container">
                        <label>Username oder E-Mail Adresse</label>
                        <input type="text" placeholder="Username / E-Mail Adresse eingeben" name="uid" required>
                        <label>Passwort</label>
                        <input type="password" placeholder="Passwort eingeben" name="pwd" required>
                        <button type="submit" name="submit" title="Einloggen"><i class="fa-solid fa-right-to-bracket">&nbsp;</i>Einloggen</button>
                        <button type="reset" name="reset" title="Zurücksetzen"><i class="fa-solid fa-delete-left"></i></button>
                    </div>
                </form>
            </div>
        </div>
    </main>
<?php include 'includes/99.inc.php'; ?>