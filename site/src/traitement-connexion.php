<?php

require 'connect_database.php';

if (isset($_POST['email']) && isset($_POST['mdp'])) {
    $email = $_POST['email'];
    $mdp = $_POST['mdp'];

    $sql = $dbh->prepare("SELECT * FROM `utilisateur` WHERE `mail` = :email AND `mdp` = SHA1(:mdp)");
    $sql->bindParam(':email', $email);
    $sql->bindParam(':mdp', $mdp);
    $sql->execute();
    // si le mdp et l'email correponde, alors on crée une session a l'utilisteur
    if (count($sql->fetchAll()) == 1) {
        session_start();
        $_SESSION['email'] = $email;
        $_SESSION['mdp'] = SHA1($mdp);

        // creation des cookies si l'utilisteur a coché la case "se souvenir de moi"
        if (isset($_POST['souvenir'])) {
            $sql = $dbh->prepare("SELECT `user_id` FROM `utilisateur` WHERE `mail` = :email");
            $sql->bindParam(':email', $email);
            $sql->execute();
            $id = $sql->fetch(PDO::FETCH_ASSOC);
            $mdp = SHA1($mdp);
            setcookie('user_id', $id, time() + 365 * 24 * 3600, null, null, false, true);
            setcookie('password', $mdp, time() + 365 * 24 * 3600, null, null, false, true);
            header("Location:../index.php");

            // sinon redirection directe vers l'accueil
        } else {
            header("Location:../index.php");
        }
        // cas ou, la combinaison email/mdp ne marche pas
    } else {
        echo '<p class="text-center text-danger"> La combinaison email/ mots-de-passe n\'est pas exact ! Reesayer !</p>';
        include '../connexion.php';
    }
}
