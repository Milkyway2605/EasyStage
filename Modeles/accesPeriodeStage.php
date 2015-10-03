<?php

function getLesPeriodes($codeClasse, $anneeScolaire, $connexion)
{
    $req = $connexion->prepare('SELECT codePeriode, dateDebut, dateFin '
            . 'FROM periode_stage '
            . 'WHERE codeClasse = :codeClasse '
            . 'AND anneeScolaire = :anneeScolaire');
    
    $req->bindValue(':codeClasse',$codeClasse);
    $req->bindValue(':anneeScolaire',$anneeScolaire);
    
    $req->execute();
    $resultat = $req->fetchAll();
    
    return $resultat;
}

