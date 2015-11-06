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
    $req->bindValue(':codeOrganisme',$codeOrganisme);
    $req->bindValue(':typeEmploye',$typeEmploye);
    
    $req->execute();
    $resultat = $connexion->lastInsertId();
    
    return $resultat;
}


function getInfosSignataire($codeSignataire,$connexion)
{
    $req = $connexion->prepare('SELECT nom, prenom, telephone, email, fonction '
            . 'FROM employes '
            . 'WHERE codeEmploye = :codeSignataire ');
    $req->bindValue(':codeSignataire',$codeSignataire);
    
    $req->execute();
    $resultat = $req->fetch(PDO::FETCH_OBJ);
    
    return $resultat;
}

function getInfosTuteur($codeTuteur,$connexion)
{
    $req = $connexion->prepare('SELECT nom, prenom, telephone, email, fonction '
            . 'FROM employes '
            . 'WHERE codeEmploye = :codeTuteur ');
    $req->bindValue(':codeTuteur',$codeTuteur);
    
    $req->execute();
    $resultat = $req->fetch(PDO::FETCH_OBJ);
    
    return $resultat;
}
