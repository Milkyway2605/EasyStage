<?php

function getInfoEnseignantReferent($codeSection,$connexion)
{
    $req = $connexion->prepare('SELECT e.email, nom, prenom FROM enseigne e '
            . 'INNER JOIN utilisateurs u '
            . 'ON e.email = u.email '
            . 'WHERE codeSection = :codeSection '
            . 'AND estReferent = 1');
    
    $req->bindValue(':codeSection',$codeSection);
    $req->execute();
    $resultat = $req->fetchAll();    

    return $resultat;
}

