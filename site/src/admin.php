<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        td{
            border : 1px solid black;
        }
    </style>
</head>

<?php
function table_tpl($thead,$rows){
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

<body>
    <h1>Page adminstration MySneakers.</h1>
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
</body>

</html>