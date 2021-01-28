<?php

require_once "connect_database.php";

require_once "head.php";

//debut : supprimer un modele

if (isset($_GET['delete'])) {

    $sql = 'DELETE FROM ' . $_GET['table'] . ' WHERE modele_id = ' . $_GET['id'];
    if ($query = $dbh->query($sql)) {
        echo '<div class="text-center"></div>';
        echo '<main style="width: 100%; max-width: 330px; padding: 15px; margin: auto;">';
        echo 'La suppresion est validé';
        echo '</br><a href="./admin.php">Retour a l\'administration</a>';
        echo '</main>';
    } else {
        echo '<div class="text-center"></div>';
        echo '<main style="width: 100%; max-width: 330px; padding: 15px; margin: auto;">';
        echo 'Une erreur est survenue';
        echo '</br><a href="./admin.php">Retour a l\'administration</a>';
        echo '</main>';
    }
}

//debut :  Modifier un modele  

function formulaire_Modification($donnee)
{

    $html = <<<EOT

        <div class="text-center">
        <main style="width: 100%; max-width: 330px; padding: 15px; margin: auto;">

        
            <form action="crud.php" method="post">
                  <h1 class="h3 mb-3 fw-normal">Modification</h1>
                <label for="id">Id : </label>
                <input type="text" class="form-control" name="modele_id" value="{$donnee['modele_id']}" autofocus required>
              <div>
                  <label for="nom">Nom : </label>
                  <input type="text" class="form-control" name="nom" value="{$donnee['nom']}" autofocus required>
              </div>
              <div>
                 <label for="prix">Prix : </label>
                    <input style="margin-bottom : 10px"type="number" class="form-control" name="prix" value="{$donnee['prix']}" autofocus required>
             </div>
             <div>
                    <button type="submit" class="w-100 btn btn-lg btn-primary">Mise a jour</button>
                </div>
            </form>
            </main>
        </div>

EOT;

    return $html;
};

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
        $sql = "UPDATE `modele` SET nom = '$nom', prix = '$prix' WHERE `modele_id` = $id";
    }

    if ($dbh->exec($sql) === 1) {
        echo '<div class="text-center"></div>';
        echo '<main style="width: 100%; max-width: 330px; padding: 15px; margin: auto;">';
        echo 'La modification est validé';
        echo '</br><a href="./admin.php">Retour a l\'administration</a>';
        echo '</main>';
    } else {
        echo '<div class="text-center"></div>';
        echo '<main style="width: 100%; max-width: 330px; padding: 15px; margin: auto;">';
        echo 'Une erreur est survenue';
        echo '</br><a href="./admin.php">Retour a l\'administration</a>';
        echo '</main>';
    }
}
