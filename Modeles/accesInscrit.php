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
