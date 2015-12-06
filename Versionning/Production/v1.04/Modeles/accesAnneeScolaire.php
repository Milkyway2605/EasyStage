<?php

function getLesAnnees($connexion)
{
    $req = $connexion->prepare('SELECT dateDebut FROM annee_scolaire');
    $req->execute();
    $resultat = $req->fetchAll();
    
    return $resultat;
}
