<?php

function getSection($connexion)
{
    $req = $connexion->prepare('SELECT codeSection, libelleSection, nbNiveau '
            . 'FROM SECTION');
    $req->execute();
    $resultat = $req->fetchAll();
    
    return $resultat;
}

