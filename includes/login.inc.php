<?php
    if(isset($_POST["submit"])) {
        $uid = $_POST["uid"];
        $pwd = $_POST["pwd"];

        include "../classes/dbh.classes.php";
        include "../classes/login.classes.php";
        include "../classes/login-contr.classes.php";
        $login = new loginContr($uid, $pwd);

        $login->loginUser();

        header("Location: ../index.php?error=none");
    }