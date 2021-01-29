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
                <th>$thead[2]</th>
                <th>$thead[3]</th>


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
          <td>{$donnee['user_id']}</td>
          <td>{$donnee['pseudo']}</td>
          <td>{$donnee['mail']}</td>
          <td>{$donnee['admin']}</td>
          <td><a href="crud.php?admin&table=utilisateur&id={$donnee['user_id']}"><button>Admin On/off</button></a></td>
       </tr>
EOT;

    return $html;
}

?>


<div class="allignement">
    <h1 class="h3 mb-3 fw-normal">Qui sont nos utilisateurs ?</h1>

    <?php

    $rows = "";
    $donnees = $dbh->query("SELECT * FROM utilisateur");
    foreach ($donnees->fetchAll(PDO::FETCH_ASSOC) as $n) {
        $rows .= echo_ligne_modeles($n);
    }
    echo table_tpl(['Id_user', 'Nom d\'utilisateur', 'Adresse mail', 'Admin ?', 'Supprimer'], $rows);
    ?>
    </tbody>
    </table>
    <?php require_once "sidebar.php"; ?>


    </body>

    </html>