<?php

function getLesTuteurs($connexion)
{
    $req = $connexion->prepare('SELECT codeEmploye, nom, prenom, telephone, email, '
            . 'fonction, codeEntreprise '
            . 'FROM employes '
            . 'WHERE typeEmploye = 2 ');
    
    $req->execute();
    $resultat = $req->fetchAll();
    
    return $resultat;
}

function getLesSignataires($connexion)
{
    $req = $connexion->prepare('SELECT codeEmploye, nom, prenom, telephone, email, '
            . 'fonction, codeEntreprise '
            . 'FROM employes '
            . 'WHERE typeEmploye = 1 ');
    
    $req->execute();
    $resultat = $req->fetchAll();
    
    return $resultat;
}

