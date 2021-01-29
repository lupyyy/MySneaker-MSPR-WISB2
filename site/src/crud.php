<?php

require_once "connect_database.php";

require_once "head.php";

if ($_GET['table'] === "modele") {
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

        
            <form action="crud.php?update&table=modele&id={$donnee['modele_id']}" method="post">
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
    }

    // debut: ajout modele
    if (isset($_GET['create'])) {

        $nom = $_POST['nom'];
        $marque_id = $_POST['marque'];
        $prix = $_POST['prix'];

        if (empty($_FILES['image'])) {
            $uploadFile = " ";
        } else {
            $uploadFile = basename($_FILES['image']['name']);
        }

        $err = 0;
        if (empty($nom))
            $err = 1;
        if (empty($marque_id))
            $err = 1;
        if (empty($prix))
            $err = 1;

        // insertion en bdd ajout
        if ($err == 0) {
            $sql = "INSERT INTO `modele` (`nom`,`prix`,`img`) VALUES ('$nom','$prix','$uploadFile')";

            if (!empty($_FILES['image'])) {
                $uploadDir = '../assets/uploads/';
                if (
                    move_uploaded_file($_FILES['image']['tmp_name'], $uploadDir . $uploadFile)
                ) {
                }
            }
        }
        // liasion entre la marque et l'id
        if ($dbh->exec($sql) === 1) {
            $sql = "SELECT modele_id FROM `modele` ORDER BY `modele_id` DESC LIMIT 1";
            $modele_id = $dbh->lastInsertId();
            $sql = "INSERT INTO `appartient` (`marque_id`,`modele_id`) VALUES ('$marque_id', '$modele_id')";
            if ($dbh->exec($sql) === 1) {
                echo '<div class="text-center"></div>';
                echo '<main style="width: 100%; max-width: 330px; padding: 15px; margin: auto;">';
                echo 'L\'ajout est effectué';
                echo '</br><a href="./admin.php">Retour a l\'administration</a>';
                echo '</main>';
            }
        } else {
            echo '<div class="text-center"></div>';
            echo '<main style="width: 100%; max-width: 330px; padding: 15px; margin: auto;">';
            echo 'Une erreur est survenue';
            echo '</br><a href="./admin.php">Retour a l\'administration</a>';
            echo '</main>';
        }
    }
}
//
if ($_GET['table'] === "marque") {
    //debut : supprimer une marque
    if (isset($_GET['delete'])) {

        $sql = 'DELETE FROM ' . $_GET['table'] . ' WHERE marque_id = ' . $_GET['id'];
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

    //debut :  Modifier une marque  

    function formulaire_Modification($donnee)
    {

        $html = <<<EOT
 
         <div class="text-center">
         <main style="width: 100%; max-width: 330px; padding: 15px; margin: auto;">
 
         
             <form action="crud.php?update&table=marque&id={$donnee['marque_id']}" method="post">
                   <h1 class="h3 mb-3 fw-normal">Modification</h1>
                 <label for="marque_id">Id : </label>
                 <input type="text" class="form-control" name="marque_id" value="{$donnee['marque_id']}" autofocus required>
               <div>
                   <label for="nom">Nom : </label>
                   <input type="text" class="form-control" name="nom" value="{$donnee['nom']}" autofocus required>
               </div>
               <div>
                  <label for="histoire">Histoire : </label>
                     <input style="margin-bottom : 10px" type="text" class="form-control" name="histoire" value="{$donnee['histoire']}" autofocus required>
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
        $sql = 'SELECT * FROM ' . $_GET['table'] . ' WHERE marque_id = ' . $_GET['id'];
        if ($query = $dbh->query($sql)) {
            foreach ($query->fetchAll(PDO::FETCH_ASSOC) as $n) {
                // print_r($n);
                if ($_GET['table'] == 'marque') {
                    echo (formulaire_Modification($n));
                }
            }
        }


        if (!empty($_POST)) {
            $id = $_POST['marque_id'];
            $nom = $_POST['nom'];
            $histoire = $_POST['histoire'];
            $histoire = addslashes($histoire);
            $err = 0;
            if (empty($id))
                $err = 1;
            if (empty($nom))
                $err = 1;
            if (empty($histoire))
                $err = 1;

            if ($err == 0) {

                $sql = "UPDATE `marque` SET nom = '$nom', histoire = '$histoire' WHERE `marque_id` = $id";
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
    }
    // debut: ajout modele
    if (isset($_GET['create'])) {

        $nom = $_POST['nom'];
        $histoire = $_POST['histoire'];

        if (empty($_FILES['image'])) {
            $uploadFile = " ";
        } else {
            $uploadFile = basename($_FILES['image']['name']);
        }

        $err = 0;
        if (empty($nom))
            $err = 1;
        if (empty($histoire))
            $err = 1;

        // insertion en bdd ajout
        if ($err == 0) {
            $sql = "INSERT INTO `marque` (`nom`,`histoire`,`img`) VALUES ('$nom','$histoire','$uploadFile')";

            if (!empty($_FILES['image'])) {
                $uploadDir = '../assets/uploads/';
                if (
                    move_uploaded_file($_FILES['image']['tmp_name'], $uploadDir . $uploadFile)
                ) {
                }
            }
        }
        if ($dbh->exec($sql) === 1) {
            echo '<div class="text-center"></div>';
            echo '<main style="width: 100%; max-width: 330px; padding: 15px; margin: auto;">';
            echo 'L\'ajout est effectué';
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
}

// Gestion des admin 
if ($_GET['table'] === "utilisateur") {
    if (isset($_GET['admin'])) {

        $id = $_GET['id'];

        $sql = 'SELECT * FROM ' . $_GET['table'] . ' WHERE user_id = ' . $_GET['id'];
        if ($query = $dbh->query($sql)) {
            $result = $query->fetch(PDO::FETCH_ASSOC);
        }
        if ($result['admin'] === "1") {
            $sql = "UPDATE `utilisateur` SET `admin` = 0 WHERE `user_id` = $id";
            if ($dbh->exec($sql) === 1) {
                echo '<div class="text-center">';
                echo '<main style="width: 100%; max-width: 330px; padding: 15px; margin: auto;">';
                echo 'Modification effectué !';
                echo '</br><a href="./admin.php">Retour a l\'administration</a>';
                echo '</main></div>';
            }
        } else {
            $sql = "UPDATE `utilisateur` SET `admin` = 1 WHERE `user_id` = $id";
            if ($dbh->exec($sql) === 1) {
                echo '<div class="text-center">';
                echo '<main style="width: 100%; max-width: 330px; padding: 15px; margin: auto;">';
                echo 'Modification effectué !';
                echo '</br><a href="./admin.php">Retour a l\'administration</a>';
                echo '</main></div>';
            }
        }
    }
}
