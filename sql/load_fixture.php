<?php
    require "../src/connect_database.php";
    // TODO ici il faudra faire une boucle pour prendre tous les fichiers fixtures
    $fichiers = ["modele.sql", "marque.sql"]; // etc.
    $sql = file_get_contents('fixtures/fixtures.sql');
    
    //$res = $dbh->exec($sql);
    try {
        $dbh->beginTransaction();
    
        $res = $dbh->exec($sql);
    
        $dbh->commit();
    } catch(Exception $e) {
        $dbh->rollback();
        throw $e;
    }
   
    if ($res === false) {
        echo "\nPDO::errorInfo():\n";
        print_r($dbh->errorInfo());
    }
    else {
        echo "Fixtures chargées avec succès !";
    }