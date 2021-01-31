
<nav class="navbar navbar-expand-lg navbar-dark bg-dark static-top">
        <div class="container">
            <a class="navbar-brand" href="index.php">MySneakers</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse">
                <ul class="navbar-nav ml-auto">
                    <li class="nav-item active"><a class="nav-link" href="index.php">Accueil</a></li>
                    <?php 
                    session_start();
                    if(!array_key_exists('email',$_SESSION)){
                        echo '<li class="nav-item"><a class="nav-link" href="./connexion.php">Connexion/Inscription</a></li>';

                    }

                    if(array_key_exists('email',$_SESSION)){
                        echo '<li class="nav-item"><a class="nav-link text-danger" href="./src/deconnexion.php">Deconnexion '. $_SESSION['email'] .' </a></li>'; 
                    }
                    ?>
                    
                </ul>
            </div>
        </div>
    </nav>