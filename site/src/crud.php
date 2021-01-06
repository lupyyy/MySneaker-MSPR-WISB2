<?php

require_once "connect_database.php";

function formulaire_Modification($donnee)
{

    $html = <<<EOT
        <form action="crud.php" method="post">
            <div>
                <label for="id">Id : </label>
                <input type="text" name="modele_id" value="{$donnee['modele_id']}" required>
            </div>
            <div>
                <label for="nom">Nom : </label>
                <input type="text" name="nom" placeholder="{$donnee['nom']}" required>
            </div>
            <div>
                <label for="prix">Prix : </label>
                <input type="number" name="prix" placeholder="{$donnee['prix']}" required>
            </div>
            <div>
                <button type="submit">Update</button>
            </div>
        </form>

EOT;

    return $html;
};

if (isset($_GET['delete'])) {

    $sql = 'DELETE FROM ' . $_GET['table'] . ' WHERE modele_id = ' . $_GET['id'];
    if ($query = $dbh->query($sql)) {
        echo 'ok';
    }
}

if (isset($_GET['update'])) {
    $sql = 'SELECT * FROM ' . $_GET['table'] . ' WHERE modele_id = ' . $_GET['id'];
    if ($query = $dbh->query($sql)) {
        foreach ($query->fetchAll(PDO::FETCH_ASSOC) as $n) {
            // print_r($n);
            if ($_GET['table'] == 'modele') {
                echo (formulaire_Modification($n));
            }
        }
    }
}

if (!empty($_POST)) {
    $id = $_POST['modele_id'];
    $nom = $_POST['nom'];
    $prix = $_POST['prix'];
    $err = 0;
    if (empty($id))
        $err = 1;
    if (empty($nom))
        $err = 1;
    if (empty($prix))
        $err = 1;

    if ($err == 0) {
        $sql = 'UPDATE `modele` SET `nom` = ($nom) , `prix` = ($prix) WHERE `modele_id` = ($modele_id)';
    }

    if ($dbh->exec($sql) === 1) {
        echo 'La base de donnée a bien etait modifiée';
        exit;
    } else {
        exit('Ca marche pas frere');
    }
}
