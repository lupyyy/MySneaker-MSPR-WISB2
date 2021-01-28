<?php
require_once "head.php";
function table_tpl($thead, $rows)
{
    $html = <<<EOT

<table>
        <thead>
            <tr>
                <th>$thead[0]</th>
                <th>$thead[1]</th>
            </tr>
        </thead>
        <tbody>
            $rows
        </tbody>
    </table>

EOT;

    return $html;
}

function echo_ligne_modeles($donnee)
{

    $html = <<<EOT
       <tr>
          <td>{$donnee['nom']}</td>
          <td>{$donnee['prix']}€</td>
          <td><a href="crud.php?delete&table=modele&id={$donnee['modele_id']}"><button>Supprimer</button></a></td>
          <td><a href="crud.php?update&table=modele&id={$donnee['modele_id']}"><button>Modifier</button></a></td>

       </tr>
EOT;

    return $html;
}

?>

<?php require_once "sidebar.php"; ?>

<div class="allignement">
    <div class="text-center">
        <main style="width: 100%; max-width: 330px; padding: 15px; margin: auto;">


            <form action="crud.php" method="post">
                <h1 class="h3 mb-3 fw-normal">Ajout</h1>
                <label for="id">Id : </label>
                <input type="text" class="form-control" name="modele_id" placeholder="Exemple : 125" autofocus required>
                <div>
                    <label for="nom">Nom : </label>
                    <input type="text" class="form-control" name="nom" value="{$donnee['nom']}" autofocus required>
                </div>
                <div>
                    <label for="prix">Prix : </label>
                    <input style="margin-bottom : 10px" type="number" class="form-control" name="prix" value="{$donnee['prix']}" autofocus required>
                </div>
                <div>
                    <button type="submit" class="w-100 btn btn-lg btn-primary">Mise a jour</button>
                </div>
            </form>
        </main>
    </div>
    <?php

    require_once "connect_database.php";
    $rows = "";
    $donnees = $dbh->query("SELECT * FROM modele");
    foreach ($donnees->fetchAll(PDO::FETCH_ASSOC) as $n) {
        $rows .= echo_ligne_modeles($n);
    }
    echo table_tpl(['Liste des modeles', 'prix'], $rows);
    ?>
    </tbody>
    </table>
    <div class="login-form">

    </div>

    </body>

    </html>