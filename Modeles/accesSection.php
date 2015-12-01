<?php

function getSection($connexion)
{
    $req = $connexion->prepare('SELECT codeSection, libelleSection, nbNiveau '
            . 'FROM section');
    $req->execute();
    $resultat = $req->fetchAll();
    
    return $resultat;
}

function getLesSections($emailEnseignant,$connexion)
{
    $req = $connexion->prepare('SELECT libelleSection, nbNiveau '
            . 'FROM section s '
            . 'INNER JOIN enseigne e '
            . 'ON s.codeSection = e.codeSection '
            . 'WHERE email = :emailEnseignant ');
    $req->bindValue(':emailEnseignant',$emailEnseignant);
    $req->execute();
    $resultat = $req->fetchAll();
    
    return $resultat;
}