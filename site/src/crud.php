<?php

require_once "connect_database.php";

function formulaire_Modification($donnee) {
    
    $html = <<<EOT
        <form action="/crud.php" method="post">
            <div>
                <label for="id">Id : </label>
                <input type="text" name="id" placeholder="{$donnee['id']}" disabled>
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
 } ;

if(isset($_GET['delete'])) {

$sql = 'DELETE FROM ' . $_GET['table']. ' WHERE modele_id = ' . $_GET['id'];
if($query = $dbh->query($sql)) {
  echo 'ok';
}

}

if(isset($_GET['update'])) {
    if($_GET['table'] == 'modele'){
        echo(formulaire_Modification($donnee));
    }

}