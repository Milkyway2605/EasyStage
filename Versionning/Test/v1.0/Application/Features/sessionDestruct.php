<?php

/**
 * Procédure permettant de détruire une session et redirige l'utilisateur vers la page de connexion
 */
function sessionDestruct()
{
    session_start();
    session_destroy();
    unset($_SESSION);
    header('location: ../../index.php');
    exit;
}

sessionDestruct();