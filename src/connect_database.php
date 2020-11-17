<?php   $db = "mysql:host=localhost;dbname=mysneakers";
        $user = "root";
        $password = "";
        $dbh = new PDO($db,$user,$password);
        $dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
?>