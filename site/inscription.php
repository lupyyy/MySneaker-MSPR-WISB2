<?php
require_once './src/connect_database.php';
require_once './src/head.php'
?>

<body style="background-color : #F1E9FF;">
        <p><a href="index.php">Retour a l'accueil</a></p>
        <main style="width: 100%; max-width: 500px; padding: 15px; margin: auto;">


                <div class="login-form">
                        <form method="post" action="./src/traitement-inscription.php" enctype="multipart/form-data">
                                <h2 class="text-center">Inscription à MySneakers</h2>
                                <div class="form-group"><input type="text" name="pseudo" class="form-control" placeholder="Pseudo" required="required" autofocus></div>
                                <div class="form-group"><input type="e-mail" name="email" class="form-control" placeholder="E-mail" required="required" autofocus></div>
                                <div class="form-group"><input type="password" name="mdp" class="form-control" placeholder="Mots-de-passe" required="required" id="mdp" autofocus></div>
                                </br>
                                <label for="avatar">Choisir votre photo de profil</label>
                                <input name="avatar" type="file" accept=".png,.jpg,.jpeg,.gif,.svg,.webp"><br><br>
                                <button type="submit" class="btn btn-primary btn-block">S'inscrire</button>
                </div>
                </form>
                <p class="text-center"><a href="connexion.php">Vous avez deja un compte ? </a></p>
                </div>
        </main>
</body>

</html>