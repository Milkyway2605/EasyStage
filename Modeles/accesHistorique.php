<?php

function getLesAnnees($emailEnseignant,$connexion)
{
    $req = $connexion->prepare('SELECT DISTINCT(anneeScolaire) '
            . 'FROM historique '
            . 'WHERE emailEnseignant = :emailEnseignant');
    
    $req->bindValue(':emailEnseignant',$emailEnseignant);
    
    $req->execute();
    $resultat = $req->fetchAll();
    
    return $resultat;
}

function getLesSection($emailEnseignant,$annee,$connexion)
{
    $req = $connexion->prepare('SELECT DISTINCT(s.codeSection), libelleSection '
            . 'FROM section s '
            . 'INNER JOIN classe c '
            . 'ON s.codeSection = c.codeSection '
            . 'INNER JOIN historique h '
            . 'ON c.codeClasse = h.codeClasse '
            . 'WHERE emailEnseignant = :emailEnseignant '
            . 'AND anneeScolaire = :anneeScolaire');
    
    $req->bindValue(':emailEnseignant',$emailEnseignant);
    $req->bindValue(':anneeScolaire',$annee);
    
    $req->execute();
    $resultat = $req->fetchAll();
    
    return $resultat;
}

function getLesClasses ($emailEnseignant,$annee,$codeSection,$connexion)
{
    $req = $connexion->prepare('SELECT codeClasse, niveau '
            . 'FROM classe c '
            . 'INNER JOIN historique h '
            . 'ON c.codeClasse = h.codeClasse '
            . 'WHERE emailEnseignant = :emailEnseignant '
            . 'AND anneeScolaire = :annee '
            . 'AND codeSection = :codeSection');
    
    $req->bindValue(':emailEnseignant',$emailEnseignant);
    $req->bindValue(':anneeScolaire',$annee);
    $req->bindValue(':codeSection',$codeSection);
    
    $req->execute();
    $resultat = $req->fetchAll();
    
    return $resultat;
}
