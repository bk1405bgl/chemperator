<?php
    if(isset($_POST["submit"])) {
        $uid = $_POST["uid"];
        $pwd = $_POST["pwd"];
        $pwd_repeat = $_POST["pwd_repeat"];
        $email = $_POST["email"];

        include "../classes/dbh.classes.php";
        include "../classes/signup.classes.php";
        include "../classes/signup-contr.classes.php";
        $signup = new SignupContr($uid, $pwd, $pwd_repeat, $email);

        $signup->signupUser();

        header("Location: ../index.php?error=none");
    }