<?php
require "../src/connect_database.php";
$sql = '';
$fichiers = ["modele.sql", "marque.sql", "utilisateur.sql", "appartient.sql", "souhaite.sql", "possede.sql"];

foreach ($fichiers as $fichier) {
    $sql .= file_get_contents('fixtures/' . $fichier);
} echo $sql; 
exit;


//$res = $dbh->exec($sql);
try {
    $dbh->beginTransaction();

    $res = $dbh->exec($sql);

    $dbh->commit();
} catch (Exception $e) {
    $dbh->rollback();
    throw $e;
}

if ($res === false) {
    echo "\nPDO::errorInfo():\n";
    print_r($dbh->errorInfo());
} else {
    echo "Fixtures chargées avec succès !";
}