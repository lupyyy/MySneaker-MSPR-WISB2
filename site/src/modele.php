<?php
require_once "head_back.php";
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
          <td>{$donnee['prix']}€</td>
          <td><a href="crud.php?delete&table=modele&id={$donnee['modele_id']}"  onclick="return confirm('Voulez vous vraiment supprimer ?');"><button>Supprimer</button></a></td>
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


            <form action="crud.php?create&table=modele" method="post" enctype="multipart/form-data">
                <h1 class="h3 mb-3 fw-normal">Ajout modele</h1>
                <div>
                    <label for="nom">Nom : </label>
                    <input type="text" class="form-control" name="nom" placeholder="Nom du modele" autofocus required>
                </div>
                <label name="marque">Marque : </label>
                <select class="form-control" name="marque" required>
                    <?php
                    $sql = "SELECT nom, marque_id from marque;";
                    foreach ($dbh->query($sql) as $ligne) {
                        echo "<option value=" . $ligne['marque_id'] . ">" . $ligne['marque_id'] . "-" .$ligne['nom'] . "</option>";
                    }
                    ?>
                </select>
                <div>
                    <label for="prix">Prix : </label>
                    <input style="margin-bottom : 10px" type="number" class="form-control" placeholder ="10" name="prix" autofocus required>
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