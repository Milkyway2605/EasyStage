<?php

// Déclaration de la page d'accueil
$fmk->initIndexRoute("index", "", "Controller/connexion.php", "index");
//cette ligne crée une route les arguments sont le nom, l'adresse lisible, le chemin vers le contrôleur et l'action
$fmk->initRoute("login", "index.php", "Controller/connexion.php","index");
$fmk->initRoute("accueil", "accueil.php", "Controller/accueil.php", "index");
$fmk->initRoute("profil", "profil.php", "Controller/profil.php", "index");
$fmk->initRoute("creerStage", "creerStage.php", "Controller/creerStage.php", "index");
$fmk->initRoute("gererMonStage", "gererMonStage.php", "Controller/gererMonStage.php", "index");
$fmk->initRoute("convention", "convention.php", "Controller/convention.php", "index");
$fmk->initRoute("passwordReset", "passwordReset.php", "Controller/passwordReset.php", "index");
$fmk->initRoute("forgetPassword", "forgetPassword.php", "Controller/forgetPassword.php", "index");
$fmk->initRoute("creerEtudiant", "creerEtudiant.php", "Controller/creerEtudiant.php", "index");
$fmk->initRoute("gererStage", "gererStage.php", "Controller/gererStage.php", "index");
$fmk->initRoute("classes", "classes.php", "Controller/classes.php", "index");
$fmk->initRoute("syntheseStage", "syntheseStage.php", "Controller/syntheseStage.php", "index");
$fmk->initRoute("gestionPeriode", "gestionPeriode.php", "Controller/gestionPeriode.php", "index");

