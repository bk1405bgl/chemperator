<?php
    include_once "config/app.php";
?>
<!DOCTYPE html>
<html lang="de">

<head>
    <meta charset="utf-8">
    <title>Registrieren</title>
    <meta name="description" content="Chemperator ERP System for chemical industry businesses">
    <meta name="author" content="Bilal Kuzey">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="assets/css/reset.css">
    <link rel="stylesheet" href="assets/css/styles.css">
</head>

<body>
<div>
    <nav>
        <ul>
            <li><a href="/">Home</a></li>
            <li><a href="signin.php">Einloggen</a></li>
            <li><a href="signup.php">Registrieren</a></li>
        </ul>
    </nav>
    <main>
        <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
            <div class="container">
                <h1>Registrieren</h1>
                <p>Bitte füllen Sie die untenstehenden Felder aus.</p>
                <hr>
                <label for="email">E-Mail</label>
                <input type="email" placeholder="max@mustermann.de" name="email" id="email" required>
                <label for="password">Passwort</label>
                <input type="password" placeholder="********" name="password" id="password" required>
                <label for="password_confirmation">Passwort wiederholen</label>
                <input type="password" placeholder="********" name="password_confirmation" id="password_confirmation" required>
                <button type="submit" name="register">Registrieren</button>
                <button type="reset" name="reset">Zurücksetzen</button>
            </div>
        </form>
    </main>
    <footer>
        <div>
            <p>Chemperator &copy;<?= date("Y");?></p>
        </div>
    </footer>
</div>
</body>

</html>
