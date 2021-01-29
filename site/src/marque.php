<?php
require_once "head.php";
require_once "connect_database.php";
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
          <td>{$donnee['histoire']}€</td>
          <td><a href="crud.php?delete&table=marque&id={$donnee['marque_id']}"><button>Supprimer</button></a></td>
          <td><a href="crud.php?update&table=marque&id={$donnee['marque_id']}"><button>Modifier</button></a></td>

       </tr>
EOT;

    return $html;
}

?>

<?php require_once "sidebar.php"; ?>

<div class="allignement">
    <div class="text-center">
        <main style="width: 100%; max-width: 330px; padding: 15px; margin: auto;">


            <form action="crud.php?create&table=marque" method="post" enctype="multipart/form-data">
                <h1 class="h3 mb-3 fw-normal">Ajout marque</h1>
                <div>
                    <label for="nom">Nom : </label>
                    <input type="text" class="form-control" name="nom" placeholder="Nom du modele" autofocus required>
                </div>
                <div>
                    <label for="histoire">Histoire : </label>
                    <input style="margin-bottom : 10px" type="text" class="form-control" placeholder="10" name="histoire" autofocus required>
                </div>

                <div>
                    <label for="image">Choisir une image</label>
                    <input name="image" type="file" accept=".png,.jpg,.jpeg,.gif,.svg,.webp"><br><br>
                </div>
                <div>
                    <button type="submit" class="w-100 btn btn-lg btn-primary">Ajouter</button>
                </div>
            </form>
        </main>
    </div>
    <?php

    $rows = "";
    $donnees = $dbh->query("SELECT * FROM marque");
    foreach ($donnees->fetchAll(PDO::FETCH_ASSOC) as $n) {
        $rows .= echo_ligne_modeles($n);
    }
    echo table_tpl(['Liste des marques', 'Histoire'], $rows);
    ?>
    </tbody>
    </table>

    </body>

    </html>