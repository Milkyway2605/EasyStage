<?php

/**
 * Procédure qui renvoie un visiteur à la page de connexion si une session n'est pas
 * définie.
 */
function backConnexion()
{
    // On teste si la variable de session existe et contient une valeur
    if(empty($_SESSION['email'])) 
    {
      // Si inexistante ou nulle, on redirige vers le formulaire de login
      header('Location: index.php');
      exit();
    }
}

