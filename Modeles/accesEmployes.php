<?php

function getLesTuteurs($connexion)
{
    $req = $connexion->prepare('SELECT codeEmploye, nom, prenom, telephone, email, '
            . 'fonction, codeOrganisme '
            . 'FROM employes '
            . 'WHERE typeEmploye = 2 ');
    
    $req->execute();
    $resultat = $req->fetchAll();
    
    return $resultat;
}

function getLesSignataires($connexion)
{
    $req = $connexion->prepare('SELECT codeEmploye, nom, prenom, telephone, email, '
            . 'fonction, codeOrganisme '
            . 'FROM employes '
            . 'WHERE typeEmploye = 1 ');
    
    $req->execute();
    $resultat = $req->fetchAll();
    
    return $resultat;
}

function createEmploye($nom,$prenom,$telephone,$email,$fonction,$codeOrganisme,$typeEmploye,$connexion)
{
    $req = $connexion->prepare('INSERT INTO employes '
            . '(nom,prenom,telephone,email,fonction,codeOrganisme,typeEmploye) '
            . 'VALUES(:nom,:prenom,:telephone,:email,:fonction,:codeOrganisme,:typeEmploye)');
    
    $req->bindValue(':nom',$nom);
    $req->bindValue(':prenom',$prenom);
    $req->bindValue(':telephone',$telephone);
    $req->bindValue(':email',$email);
    $req->bindValue(':fonction',$fonction);
    $req->bindValue(':codeEntreprise',$codeOrganisme);
    $req->bindValue(':typeEmploye',$typeEmploye);
    
    $req->execute();
    $resultat = $req->lastInsertId();
    
    return $resultat;
}
