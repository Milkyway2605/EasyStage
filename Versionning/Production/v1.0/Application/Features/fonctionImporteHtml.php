<?php

/**
 * Fonction qui retourne le contenu d'un fichier HTML à partir de son chemin saisie en paramètre.
 * @param string $chemin Chemin du fichier HTML.
 * @return html $contenu Contenu du fichier HTML.
 */
 function importe_HTML($chemin)
{
    ob_start(); //Démarre la bufferisation de sortie
    include $chemin;//Remplit le buffer avec le contenu du fichier $chemin
    $contenu = ob_get_contents();//Le met dans une chaine de caractères qui sera retournée
    ob_end_clean();//Efface et supprime le buffer
    return $contenu;//returne le contenu du fichier $chemin
} 

