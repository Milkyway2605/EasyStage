<?php

/**
 * 
 * @param type $codeUtilisateur code de l'utilisateur actuellement connecté
 * @param type $operande "!=" ou "=="
 * @param type $typeUtilisateur
 * @return boolean
 */
function autorisationAcces($codeUtilisateur,$operande,$typeUtilisateur)
{
    $autorise = true;
    
    switch($operande)
    {
        case "!=":
            if($codeUtilisateur != $typeUtilisateur)
            {
                $autorise = false;
            }
            break;
        case "==":
            if($codeUtilisateur != $typeUtilisateur)
            {
                $autorise = false;
            }
            break;
        default:
            break;
    }
    
    return $autorise;
}

