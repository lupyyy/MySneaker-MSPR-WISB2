<?php
include 'connect_database.php';
if (!empty($_POST)) {
    $pseudo = $_POST['pseudo'];
    $email = $_POST['email'];
    $mdp = $_POST['mdp'];

    if (empty($_FILES['avatar'])) {
        $uploadFile = " ";
    } else {
        $uploadFile = basename($_FILES['avatar']['name']);
    }

    $err = 0;

    if (empty($pseudo))
        $err = 1;
    if (empty($email))
        $err = 1;
    if (empty($mdp))
        $err = 1;

    if ($err == 0) {
        $sql = "INSERT INTO `utilisateur` (`pseudo`,`mail`,`mdp`,`img`) VALUES ('$pseudo','$email',SHA1('$mdp'),'$uploadFile')";

        if (!empty($_FILES['avatar'])) {
            $uploadDir = 'uploads/';
            if (
                move_uploaded_file($_FILES['avatar']['tmp_name'], $uploadDir . $uploadFile)
            ) {
            }
        }

        if ($dbh->exec($sql) === 1) {
            echo '<p class="text-center text-success">Vous etes bien inscrit, veuillez vous connecter maintenant';
            include '../connexion.php';
            exit;
        } else {
            exit('Un probleme est survenue. Ce pseudo ou cette e-mail est peut etre deja utilisé.');
        }
    } else {
        $msg = "Veuillez-remplir tout les champs";
        echo $msg;
    }
}
