<a class="menu-toggle rounded" href="#">
    <i class="fas fa-bars"></i>
</a>
<a class="js-scroll-trigger" href="./index.php#page-top"><img style="position:fixed; width:125px; z-index:10 " src="assets/img/logomysneakers_white.svg"></a>

<nav id="sidebar-wrapper">
    <ul class="sidebar-nav">
        <li class="sidebar-nav-item">
            <a class="js-scroll-trigger" href="./index.php#page-top">Home</a>
        </li>
        <<?php
            session_start();
            if (!array_key_exists('email', $_SESSION)) {
                echo '<li class="sidebar-nav-item"><a class="js-scroll-trigger" href="./connexion.php">Connexion/Inscription</a></li>';
            }

            if (array_key_exists('email', $_SESSION)) {
                echo '<li class="sidebar-nav-item"><a class="js-scroll-trigger" href="./src/deconnexion.php">Deconnexion ' . $_SESSION['email'] . ' </a></li>';
            }
            ?> </ul>

</nav>