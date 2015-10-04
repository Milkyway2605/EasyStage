<?php

function createInscrit($codeClasse,$email,$anneeScolaire, $connexion)
{
    $req = $connexion->prepare('INSERT INTO inscrit '
            . '(codeClasse,email,dateDebut) '
            . 'VALUES (:codeClasse,:email,:anneeScolaire)');
    
    $req->bindValue(':codeClasse',$codeClasse);
    $req->bindValue(':email',$email);
    $req->bindValue(':anneeScolaire',$anneeScolaire);
    
    $reussite = $req->execute();
    
    return $reussite;
}

function getCodeClasseInscrit($email, $connexion)
{
    $req = $connexion->prepare('SELECT codeClasse '
            . 'FROM inscrit '
            . 'WHERE email = :email ');
    
    $req->bindValue(':email',$email);
    
    $req->execute();
    $resultat = $req->fetch(PDO::FETCH_OBJ);
    
    return $resultat;
}

function getCodeInscrit($email,$codeClasse,$anneeScolaire,$connexion)
{
    $req = $connexion->prepare('SELECT codeInscription '
            . 'FROM inscrit '
            . 'WHERE email = :email AND codeClasse = :codeClasse AND dateDebut = :anneeScolaire ');
    
    $req->bindValue(':email',$email);
    $req->bindValue(':codeClasse',$codeClasse);
    $req->bindValue(':anneeScolaire',$anneeScolaire);
    
    $req->execute();
    $resultat = $req->fetch(PDO::FETCH_OBJ);
    
    return $resultat;
}