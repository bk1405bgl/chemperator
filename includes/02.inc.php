<body>
    <header>
        <nav>
            <ul>
                <li><a href="/">Home</a></li>
                <?php
                if(isset($_SESSION["userid"])) {
                    ?>
                    <li><a href="userpage.php"><?php echo $_SESSION["useruid"]; ?></a></li>
                    <li><a href="includes/logout.inc.php">Logout</a></li>
                    <?php
                } else {
                    ?>
                    <li><button type="button" onclick="openModal('modal1')">Registrieren</button></li>
                    <li><button type="button" onclick="openModal('modal2')">Einloggen</button></li>
                <?php } ?>
            </ul>
        </nav>
    </header>