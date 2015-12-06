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

function getLaPeriode($codePeriode, $connexion)
{
    $req = $connexion->prepare('SELECT dateDebut, dateFin '
            . 'FROM periode_stage '
            . 'WHERE codePeriode = :codePeriode');
    
    $req->bindValue(':codePeriode',$codePeriode);
    
    $req->execute();
    $resultat = $req->fetch(PDO::FETCH_OBJ);
    
    return $resultat;
}

function getLesPeriodesParClasse($libelleSection,$niveau,$connexion)
{
    $req = $connexion->prepare('SELECT dateDebut, dateFin '
            . 'FROM periode_stage p '
            . 'INNER JOIN classe c '
            . 'ON c.codeClasse = p.codeClasse '
            . 'INNER JOIN section s '
            . 'ON s.codeSection = c.codeSection '
            . 'WHERE libelleSection = :libelleSection '
            . 'AND niveau = :niveau');
    
    $req->bindValue(':libelleSection',$libelleSection);
    $req->bindValue(':niveau',$niveau);
    
    $req->execute();
    $resultat = $req->fetchAll();
    
    return $resultat;
}

