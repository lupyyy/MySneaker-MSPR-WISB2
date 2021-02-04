<?php
require './src/head.php'
?>

<body style="background-color : #F1E9FF;">

    <p><a href="index.php">Retour a l'accueil</a></p>
    <main style="width: 100%; max-width: 500px; padding: 15px; margin: auto;">

        <div class="login-form">
            <form action="./src/traitement-connexion.php" method="post">
                <h2 class="text-center">Connexion à MySneakers</h2>
                <div class="form-group">
                    <input type="text" name="email" class="form-control" placeholder="email" required="required">
                </div>
                <div class="form-group">
                    <input type="password" name="mdp" class="form-control" placeholder="Mots-de-passe" required="required">
                </div>
                <div class="clearfix">
                    <label class="float-left form-check-label"><input name="souvenir" type="checkbox"> Se souvenir de moi</label>
                </div>
                <div class="form-group">
                    <button type="submit" class="btn btn-primary btn-block">Connexion</button>
                </div>
            </form>
            <p class="text-center"><a href="inscription.php">Vous n'avez pas de compte ? </a></p>
        </div>
    </main>

</body>

</html>