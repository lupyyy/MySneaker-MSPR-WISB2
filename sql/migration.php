<?php
    require "../src/connect_database.php";
    $date = "20201124_1420";
    $versions = "migrations-versions.txt";
    
    if( strpos(file_get_contents($versions),$date) !== true) {
        $sql = file_get_contents('migrations/' . $date . '.sql');

        $res = $dbh->exec($sql);
        if (!$res) {
        echo "\nPDO::errorInfo():\n";
        print_r($dbh->errorInfo());
        }
        else {
            echo "Migration effectuée avec succès !";
        file_put_contents($versions, $date . "\n", FILE_APPEND);
        }
    }
    else {
        echo "Migration déjà effectuée !";
    }