<!DOCTYPE html>
<html lang="de">

<head>
    <meta charset="utf-8">
    <title>Chemperator</title>
    <meta name="description" content="Chemperator ERP System for chemical industry businesses">
    <meta name="author" content="Bilal Kuzey">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="css/styles.css">
    <script src="https://kit.fontawesome.com/b13124ec84.js" crossorigin="anonymous"></script>
</head>

<body>
    <div>
	<?php
	class Links {
		public $Link;
	}
	$HomeLink = new Links();
	$InfoLink = new Links();
	$SignInLink = new Links();
	$SignUpLink = new Links();

	$HomeLink->Link = "/";
	$InfoLink->Link = "info.php";
	$SignInLink->Link = "signin.php";
	$SignUpLink->Link = "signup.php";
	?>

        <nav>
            <ul>
		<?php

		?>
                <li><a href="/">Home</a></li>
                <li><a href="signin.php">Einloggen</a></li>
                <li><a href="signup.php">Registrieren</a></li>
            </ul>
        </nav>
        <main>
            <h1>Chemperator</h1>
            <p>Chemperator ist eine ERP-Software, speziell für Firmen in der Chemiebranche.</p>
        </main>
        <footer>
            <div>
                <p>Chemperator &copy;<?php echo date("Y");?></p>
            </div>
        </footer>
    </div>
</body>

</html>
