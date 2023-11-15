
create one more file in /classes/ folder with name: 
dbh.classes.php

file content:
```
<?php
class Dbh
{
    protected function connect() {
        try {
            $username = {your username};
            $password = {your password};
            $dbh = new PDO('mysql:host={localhost};dbname={chemperator}', $username, $password);
            return $dbh;
        } catch(PDOException $e) {
            print "Connection failed: " . $e->getMessage() . "<br/>";
            die();
        }
    }
}
```
on line 6 add your username
on line 7 add your password
on line 8 add your host and your database name

also don't forget to remove the curly brackets.