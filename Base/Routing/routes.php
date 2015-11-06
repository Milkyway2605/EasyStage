<?php

// Déclaration de la page d'accueil
$fmk->initIndexRoute("login", "", "Controller/connexion.php", "index");
//cette ligne crée une route les arguments sont le nom, l'adresse lisible, le chemin vers le contrôleur et l'action
$fmk->initRoute("connexion", "connexion.html", "Controller/connexion.php", "index");
$fmk->initRoute("accueil", "accueil.html", "Controller/accueil.php", "index");
