<?php
class Login extends Dbh {

    protected function getUser($uid, $pwd) {
        $stmt = $this->connect()->prepare('SELECT * FROM users WHERE users_uid = ? OR users_email = ?;');

        if (!$stmt->execute(array($uid, $uid))) {
            $stmt = null;
            echo "SQL Error: " . implode(" ", $stmt->errorInfo());
            header("Location: ../index.php?error=stmtfailed");
            exit();
        }

        $user = $stmt->fetch(PDO::FETCH_ASSOC);

        if (!$user) {
            $stmt = null;
            header("Location: ../index.php?error=usernotfound");
            exit();
        }


        if ($user['isActive'] == 0) {
            $stmt = null;
            header("Location: ../index.php?error=accountnotactivated");
            exit();
        }

        $pwdHashed = $user['users_pwd'];
        $checkPwd = password_verify($pwd, $pwdHashed);

        if (!$checkPwd) {
            $stmt = null;
            header("Location: ../index.php?error=wrongpassword");
            exit();
        } else {
            session_start();
            $_SESSION["userid"] = $user["users_id"];
            $_SESSION["useruid"] = $user["users_uid"];
            $stmt = null;
        }
    }
}
